<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $this->autorizacion('Encargado');

        $departamentos = Departamento::all();
        return view('departamento.index', compact('departamentos'));
    }

    public function create()
    {
        $this->autorizacion('Encargado');

        return view('departamento.create');
    }

    public function store()
    {
        $this->autorizacion('Encargado');

        $new_departamento = new Departamento;
        $new_departamento->guardar(request());
        return redirect('departamento/nuevo')->with('good', 'Registro exitoso');
    }

    public function edit($id)
    {
        $this->autorizacion('Encargado');

        $departamento = Departamento::find($id); 
        return view('departamento.edit', compact('departamento'));
    }

    public function update(Departamento $departamento)
    {
        $this->autorizacion('Encargado');

        $new_departamento = new Departamento;
        $new_departamento->actualizar(request(), $departamento);

        return redirect('departamento')->with('good', 'Modificación exitosa');
    }

    public function destroy($id)
    {
        $this->autorizacion('Encargado');

        $status ='Eliminación exitosa';

        $departamento = Departamento::find($id);
        if(count($departamento->transportes) > 0) {
            $status = 'Registro relacionado, imposible de eliminar';
        } else {
            $departamento->delete();
            return redirect('departamento')->with('good', $status);
        }
        return redirect('departamento')->with('err', $status);  
    }
}
