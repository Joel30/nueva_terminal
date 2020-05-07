<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transporte;

class TerminalController extends Controller
{
    public function nacional() 
    {
        $transportes = Transporte::whereHas('departamento',function($query){
            $query->where('tipo','Nacional');
        })->get()->sortBy('departamento.destino');
            
        $departamentos = $transportes->unique('departamento.destino')->pluck('departamento.destino');
        //dd($departamentos);

        $transportes = $transportes->where('departamento.destino',$departamentos[0]);

        return view('tablero.terminal.nacional', compact('transportes', 'departamentos'));
    }

    public function destino() 
    {
        //dd(request()->destino);
        $transportes = Transporte::whereHas('departamento',function($query){
            $query->where('tipo',request()->tipo)->where('destino',request()->destino);
        })->get()->sortBy('departamento.destino');
 
        return view('tablero.terminal.transporte', compact('transportes'));
    }

    public function buscador(Request $request)
    {
        $this->autorizacion('Encargado');

        $transportes = Transporte::all();
        $nombre = $request->texto;
        return view("transporte.buscar",compact('transportes', 'nombre'));        
    }

    public function internacional() {
        $transportes = Transporte::whereHas('departamento',function($query){
            $query->where('tipo','Internacional');
        })->get()->sortBy('departamento.destino');
            
        $departamentos = $transportes->unique('departamento.destino')->pluck('departamento.destino');
        //dd($departamentos);

        $transportes = $transportes->where('departamento.destino',$departamentos[0]);

        return view('tablero.terminal.internacional', compact('transportes', 'departamentos'));
    }
}
