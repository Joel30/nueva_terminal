<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Viaje;
use App\Transporte;

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

        $transportes = Transporte::all();
        $carbon = Carbon::now();
        $today = $carbon->format('Y-m-d');
        $time = $carbon->format('h:i');
        return view('tablero.create', compact('transportes','today','time'));
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

        $viaje = Viaje::find($id);
        return view('tablero.edit', compact('viaje')); 
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

        $fecha = Carbon::now()->format('Y-m-d');
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
        } while($viajes->count()<7 && $cont-- <= 0);

        /* $fecha = Carbon::now()->format('Y-m-d');
        $number = 1;
        do {
            $hora = Carbon::now()->subHour($number++)->subMinutes(0)->format('H:i');
            $viajes = Viaje::select()
                    ->where('hora','>=',$hora)
                    ->where('fecha',$fecha)
                    ->orderBy('hora','asc')
                    ->take(7)
                    ->get();
           

        } while($viajes->count()<7); */
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
        $fecha_fin = request()->fecha_fin;
        if ($fecha !== null){
            if ($fecha_fin !== null){
                $viajes = Viaje::whereDate('created_at','>=',$fecha)
                    ->whereDate('created_at', '<=', $fecha_fin)
                    ->get();
                $fecha = Carbon::createFromFormat('Y-m-d', $fecha)->formatLocalized('%A %d de %B de %Y');            
                $fecha_fin = Carbon::createFromFormat('Y-m-d', $fecha_fin)->formatLocalized('%A %d de %B de %Y');            
                
            } else if(strlen($fecha) == 7) {
                $viajes = Viaje::whereYear('created_at',$fecha)
                    ->whereMonth('created_at',substr($fecha, -2))
                    ->get();
                $fecha = Carbon::createFromFormat('Y-m-d', $fecha.'-01')->formatLocalized('%B de %Y');            
            }
            else {
                $viajes = Viaje::whereDate('created_at',$fecha)
                    ->get();
                $fecha = Carbon::createFromFormat('Y-m-d', $fecha)->formatLocalized('%A %d de %B de %Y');            
            }   
            
        } else {
            $viajes = Viaje::whereDate('created_at',$fecha_fin)
                    ->get();
            $fecha_fin = Carbon::createFromFormat('Y-m-d', $fecha_fin)->formatLocalized('%A %d de %B de %Y');            
                
        }
        $viajes->fecha = $fecha;
        $viajes->fecha_fin = $fecha_fin;

    
    
        
        //dd($date);
        return view('reporte.datos', compact('viajes'));
    }
}
