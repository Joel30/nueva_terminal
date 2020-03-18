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
        $viajes = Viaje::all();
        return view('tablero.index', compact('viajes'));
    }

    public function create()
    {
        $transportes = Transporte::all();
        $carbon = Carbon::now();
        $today = $carbon->format('Y-m-d');
        $time = $carbon->format('h:i');
        return view('tablero.create', compact('transportes','today','time'));
    }

    public function store()
    {
        
        $viaje = new Viaje;
        //dd(request());
        $viaje->guardar(request());

        return redirect('viaje/nuevo');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $viaje = Viaje::find($id);
        return view('tablero.edit', compact('viaje')); 
    }

    public function update(Viaje $viaje)
    {
        
        $new_viaje = new Viaje;
        $new_viaje->actualizar(request(), $viaje);
        return redirect('viaje');
    }

    public function destroy(Viaje $viaje)
    {
        $viaje->delete();
        return redirect('viaje');
    }

    public function datos_tablero(){
        $fecha = Carbon::now()->format('Y-m-d');
        $number = 7;
        do {
            $hora = Carbon::now()->addHour($number--)->addMinutes(0)->format('H:i');
            $viajes = Viaje::select()
                    ->where('hora','>=',$hora)
                    ->where('fecha',$fecha)
                    ->orderBy('hora','asc')
                    ->take(7)
                    ->get();
        } while($viajes->count()<7);

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

    public function tablero(){
        
        return view('tablero.tablero');
    }

    public function reporte(){
        return view('reporte.index');
    }

    public function buscarReporte(){

        $fecha_inicio = request()->fecha_inicio;
        $fecha_fin = request()->fecha_fin;
        
        $viajes = Viaje::whereDate('created_at','>=',$fecha_inicio)
                            ->whereDate('created_at', '<=', $fecha_fin)
                            ->get();
        $viajes->fecha_inicio = $fecha_inicio;
        $viajes->fecha_fin = $fecha_fin;

        return view('reporte.index', compact('viajes'));
    }
}
