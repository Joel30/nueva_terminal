<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporte;

class TerminalController extends Controller
{
    public function nacional() 
    {
        $nacional = Transporte::where('')->get();
    }

    public function buscador(Request $request)
    {
        $this->autorizacion('Encargado');

        $transportes = Transporte::all();
        $nombre = $request->texto;
        return view("transporte.buscar",compact('transportes', 'nombre'));        
    }

    public function internacional() {

    }
}
