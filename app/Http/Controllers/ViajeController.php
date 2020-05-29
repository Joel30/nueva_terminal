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

class ViajeController extends Controller
{
    //
    public function index()
    {
        $this->autorizacion('Encargado');

        $viajes = Viaje::select()
                    ->whereDate('created_at', Carbon::today()
                        ->format('Y-m-d'))
                    ->get();

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

    public function show($id)
    {
        //
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
        return view('tablero.edit', compact('viaje', 'destinos', 'empresas', 'buses')); 
    }

    public function update(Viaje $viaje)
    {
        $this->autorizacion('Encargado');
        
        $new_viaje = new Viaje;
        $new_viaje->actualizar(request(), $viaje);
        return redirect('viaje')->with('good', 'Modificación exitosa');
    }

    public function destroy(Viaje $viaje)
    {
        $this->autorizacion('Encargado');

        $status ='Eliminación exitosa';
        try {
            $viaje->delete();
            return redirect('viaje')->with('good', $status);
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'Registro relacionado, imposible de eliminar';
        }
        return redirect('viaje')->with('err', $status);  
    }

    public function datos_tablero()
    {
        $this->autorizacion('Encargado');

        /*$fecha = Carbon::now()->format('Y-m-d');
        $number = 7;
        $cont = 10;
        do {
            $hora = Carbon::now()->addHour($number--)->addMinutes(0)->format('H:i');
            $viajes = Viaje::select()
                    ->where('hora','>=',$hora)
                    ->where('fecha',$fecha)
                    ->orderBy('hora','asc')
                    ->take(7)
                    ->get();
            //dd($viajes);        
        } while($viajes->count()<7 && $cont-- <= 0);*/

        $fecha = Carbon::now()->format('Y-m-d');
        $number = 0;
        $cont = 24;
        $hora = null;
        do {
            $hora = Carbon::now()->subHour($number++)->subMinutes(0);
            $viajes = Viaje::select()
                    ->where('hora','>=',$hora->format('H:i'))
                    ->where('fecha',$fecha)
                    ->orderBy('hora','asc')
                    ->take(7)
                    ->get();
           
            if($hora->format('H') == "00"){
                break;
            }  
            $cont --;    
            
        } while($viajes->count() <= 7 && $cont >= 0); 
        //dd(Carbon::now()->subHour(7)->addMinutes(35)->format('h:i'));
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

    public function buscar()
    {
        $this->autorizacion('Encargado');

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
    
        return datatables()->of($viajes)->toJson();
    }
}
