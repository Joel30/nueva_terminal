<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporte;
use App\Bus;
use App\Carril;
use App\Departamento;
use App\Empresa;
//use App\Personal;

class TransporteController extends Controller
{
    public function index()
    {
        $transportes = Transporte::all();
        return view('transporte.index', compact('transportes'));
    }

    public function create()
    {
        $buses = Bus::all();
        $carriles = Carril::all();
        $departamentos = Departamento::all();
        $empresas = Empresa::all();
        
        return view('transporte.create', compact('buses', 'carriles', 'departamentos', 'empresas'));
    }

    public function store()
    {
        
        $transporte = new Transporte;
        //dd(request());
        $transporte->guardar(request());

        return redirect('transporte/nuevo');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $transporte = Transporte::find($id);
        return view('transporte.edit', compact('transporte')); 
    }

    public function update(Transporte $transporte)
    {
        //dd(request());
        $new_trasporte = new Transporte;
        $new_trasporte->actualizar(request(), $transporte);
        return redirect('transporte');
    }

    public function destroy(Transporte $transporte)
    {
        $transporte->delete();
        return redirect('transporte');
    }
}
