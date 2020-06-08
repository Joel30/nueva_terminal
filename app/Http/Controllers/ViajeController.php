<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Viaje;
use App\Transporte;
use App\Bus;
use App\Departamento;

use Yajra\Datatables\Datatables;
use Yajra\DataTables\CollectionDataTable;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\ViajesExport;
use Maatwebsite\Excel\Facades\Excel;

class ViajeController extends Controller
{
    //
    public function index()
    {
        $this->autorizacion('Encargado');

        $fecha = Carbon::today()->format('Y-m-d');

        if(request()->otros != null){
            $viajes = Viaje::whereDate('fecha', '>', $fecha)->get();
        } else {
            $viajes = Viaje::whereDate('fecha', $fecha)->get();
        }

        return view('tablero.index', compact('viajes'));
    }

    public function create()
    {
        $this->autorizacion('Encargado');

        $today = Carbon::now()->format('Y-m-d');

        $departamento_id = Transporte::where('estado','activo')->pluck('departamento_id');
        $bus_id = Transporte::where('estado','activo')->pluck('bus_id');
        $nombre_empresa = DB::table('buses')
            ->join('transportes','transportes.bus_id','buses.id')
            ->join('empresas','empresas.id','buses.empresa_id')
            ->where('estado','activo')
            ->select('nombre', 'empresa_id', 'departamento_id')
            ->distinct()
            ->orderBy('nombre','asc')
            ->get();

        $destinos = Departamento::whereIn('id', $departamento_id)->orderBy('destino', 'asc')->get();
        $empresas = $nombre_empresa;
        $buses = Bus::whereIn('id', $bus_id)->orderBy('tipo_bus','asc')->get();

        return view('tablero.create', compact('destinos', 'empresas', 'buses', 'today'));
    }

    public function store()
    {
        $this->autorizacion('Encargado');
   
        $viaje = new Viaje;
        //dd(request());
        $viaje->guardar(request());

        return redirect('viaje/nuevo')->with('good', 'Registro exitoso');
    }

    public function registro_anterior()
    {
        $this->autorizacion('Encargado');

        $fecha = request()->fecha;
    
        if ($fecha == 'fecha_actual'){
            $fecha = Carbon::now()->subDays(1)->format('Y-m-d');
        }

        $fecha_actual = Viaje::whereDate('fecha', Carbon::now()
                        ->format('Y-m-d'))
                    ->pluck('transporte_id');

        $viajes = Viaje::whereDate('fecha', $fecha)
                ->whereNotIn('transporte_id', $fecha_actual)
                ->get();

        $fecha = Carbon::createFromFormat('Y-m-d',$fecha)->format('d-m-Y');

        return view('tablero.registro_anterior', compact('viajes','fecha'));
    }

    public function copear_registros()
    {
        $this->autorizacion('Encargado');

        $viaje = new Viaje;
        $viaje->copear(request());
        // dd(request());
        return redirect('viaje')->with('info', 'Copia exitosa');
    }

    public function copear() {
        $this->autorizacion('Encargado');
   
        $viaje = new Viaje;
        //dd(request());
        $viaje->guardar(request());

        return redirect('viaje')->with('info', 'Copia exitosa');
    }

    public function edit($id)
    {
        $this->autorizacion('Encargado');

        $departamento_id = Transporte::where('estado','activo')->pluck('departamento_id');
        $bus_id = Transporte::where('estado','activo')->pluck('bus_id');
        $nombre_empresa = DB::table('buses')
            ->join('transportes','transportes.bus_id','buses.id')
            ->join('empresas','empresas.id','buses.empresa_id')
            ->where('estado','activo')
            ->select('nombre', 'empresa_id', 'departamento_id')
            ->distinct()
            ->orderBy('nombre','asc')
            ->get();

        $destinos = Departamento::whereIn('id', $departamento_id)->orderBy('destino', 'asc')->get();
        $empresas = $nombre_empresa;
        $buses = Bus::whereIn('id', $bus_id)->orderBy('tipo_bus','asc')->get();

        $viaje = Viaje::find($id);

        $copia = request()->copia;
        if($copia == true){
            $viaje['copia'] = true;
        } 
        return view('tablero.edit', compact('viaje', 'destinos', 'empresas', 'buses')); 
    }

    public function update(Viaje $viaje)
    {
        $this->autorizacion('Encargado');
        
        $new_viaje = new Viaje;
        $new_viaje->actualizar(request(), $viaje);
        return redirect(request()->previous_url)->with('good', 'Modificación exitosa');
    }

    public function destroy($id)
    {
        $this->autorizacion('Encargado');

        $status ='Eliminación exitosa';

        $viaje = Viaje::find($id);
        try {
            $viaje->delete();
            return redirect()->back()->with('good', $status);
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'Registro relacionado, imposible de eliminar';
        }
        return redirect()->back()->with('err', $status);  
    }

    public function datos_tablero()
    {
        $this->autorizacion('Encargado');

        $fecha = Carbon::now()->subMinutes(25);
        $viajes = Viaje::where('hora','>=',$fecha->format('H:i'))
                ->where('fecha','>=',$fecha->format('Y-m-d'))
                ->where('created_at', '<=', Carbon::now()->subMinutes(5))
                ->orderBy('hora','asc')
                ->take(7)
                ->get();

        return view('tablero.datos_tablero', compact('viajes'));
    }

    public function tablero()
    {
        $this->autorizacion('Encargado');
    
        return view('tablero.tablero');
    }

    public function reporte()
    {
        $this->autorizacion('Encargado');

        $viajes = Viaje::whereDate('created_at','>=',Carbon::now()->format('Y-m-d'))
                    ->get();
        //dd($viajes);
        return view('reporte.index', compact('viajes'));
    }

    public function export_pdf()
    {
        $fecha_actual = request()->fecha_actual;
        if ($fecha_actual != null) {
            $viajes = Viaje::select()
                ->whereDate('fecha', Carbon::today()
                ->format('Y-m-d'))
                ->get();
        } else {
            $registros = request()->registros;

            if($registros != null){
                $viajes = Viaje::all();
            } else {
                $fecha = request()->fecha;
                $fecha_inicio = request()->fecha_inicio;
                $fecha_fin = request()->fecha_fin;
                if ($fecha != 0){
                    $viajes = Viaje::whereYear('created_at',$fecha)
                            ->whereMonth('created_at',substr($fecha, -2))
                            ->get(); 
                } else {
                    if ($fecha_inicio != 0){
                        if ($fecha_fin != 0){
                            $viajes = Viaje::whereDate('created_at','>=',$fecha_inicio)
                                ->whereDate('created_at', '<=', $fecha_fin)
                                ->get();
                        } else {
                            $viajes = Viaje::whereDate('created_at',$fecha_inicio)
                                ->get();
                        }
                    } else {
                        $viajes = Viaje::whereDate('created_at',$fecha_fin)
                            ->get();
                    }
                }
            }
        }
      
        $pdf = PDF::loadView('reporte.exportar', compact('viajes'));
        $pdf->setPaper("letter", "portrait");
        return $pdf->stream();
    }

    public function export() 
    {
        return Excel::download(new ViajesExport(), request()->archivo);
    }

    public function buscar()
    {
        $this->autorizacion('Encargado');

        $registros = request()->registros;

        if($registros != null){
            $viajes = Viaje::select('id', 'transporte_id', 'departamento', 'empresa', 'carril', 'bus', (DB::raw('DATE_FORMAT(fecha, "%d/%m/%Y") as fecha')), (DB::raw('DATE_FORMAT(hora, "%H:%i") as hora')), 'estado', 'llegada_salida')->get();
        } else {
            $fecha = request()->fecha;
            $fecha_inicio = request()->fecha_inicio;
            $fecha_fin = request()->fecha_fin;
            if ($fecha != 0){
                $viajes = Viaje::whereYear('created_at',$fecha)
                        ->whereMonth('created_at',substr($fecha, -2))
                        ->select('id', 'transporte_id', 'departamento', 'empresa', 'carril', 'bus', (DB::raw('DATE_FORMAT(fecha, "%d/%m/%Y") as fecha')), (DB::raw('DATE_FORMAT(hora, "%H:%i") as hora')), 'estado', 'llegada_salida')
                        ->get(); 
            } else {
                if ($fecha_inicio != 0){
                    if ($fecha_fin != 0){
                        $viajes = Viaje::whereDate('created_at','>=',$fecha_inicio)
                            ->whereDate('created_at', '<=', $fecha_fin)
                            ->select('id', 'transporte_id', 'departamento', 'empresa', 'carril', 'bus', (DB::raw('DATE_FORMAT(fecha, "%d/%m/%Y") as fecha')), (DB::raw('DATE_FORMAT(hora, "%H:%i") as hora')), 'estado', 'llegada_salida')
                            ->get();
                    } else {
                        $viajes = Viaje::whereDate('created_at',$fecha_inicio)
                            ->select('id', 'transporte_id', 'departamento', 'empresa', 'carril', 'bus', (DB::raw('DATE_FORMAT(fecha, "%d/%m/%Y") as fecha')), (DB::raw('DATE_FORMAT(hora, "%H:%i") as hora')), 'estado', 'llegada_salida')
                            ->get();
                    }
                } else {
                    $viajes = Viaje::whereDate('created_at',$fecha_fin)
                        ->select('id', 'transporte_id', 'departamento', 'empresa', 'carril', 'bus', (DB::raw('DATE_FORMAT(fecha, "%d/%m/%Y") as fecha')), (DB::raw('DATE_FORMAT(hora, "%H:%i") as hora')), 'estado', 'llegada_salida')
                        ->get();
                }
            }
        }

        return datatables()->of($viajes)->addIndexColumn()->toJson();
    }
}
