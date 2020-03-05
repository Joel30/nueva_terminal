<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamento.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamento.create');
    }

    public function store()
    {
        $request = request();
        $new_departamento = new Departamento;
        $new_departamento->guardar($request);
        return redirect('departamento/nuevo');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $departamento = Departamento::find($id); 
        return view('departamento.edit', compact('departamento'));
    }

    public function update(Departamento $departamento)
    {
        $request = request();
        $new_departamento = new Departamento;
        $new_departamento->actualizar($request, $departamento);

        return redirect('departamento');
    }

    public function destroy(Departamento $departamento )
    {
        $departamento->delete();
        return redirect('departamento');
    }
}
