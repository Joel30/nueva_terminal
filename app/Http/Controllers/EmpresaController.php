<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    public function index()
    {
        $this->autorizacion('Encargado');

        $empresas = Empresa::all();

        return view('empresa.index', compact('empresas'));
    }

    public function create()
    {
        $this->autorizacion('Encargado');

        return view('empresa.create');
    }

    public function store()
    {
        $this->autorizacion('Encargado');

        $new_empresa = new Empresa;
        $new_empresa->guardar(request());

        return redirect('empresa/nuevo')->with('good', 'Registro exitoso');
    }

    public function edit($id)
    {
        $this->autorizacion('Encargado');

        $empresa = Empresa::find($id);
        return view('empresa.edit', compact('empresa'));
    }

    public function update(Empresa $empresa)
    {
        $this->autorizacion('Encargado');

        $new_empresa = new Empresa;
        $new_empresa->actualizar(request(), $empresa);

        return redirect('empresa')->with('good', 'Modificación exitosa');
    }

    public function destroy($id)
    {
        $this->autorizacion('Encargado');

        $status ='Eliminación exitosa';
        
        $empresa = Empresa::find($id);
        if(count($empresa->buses) > 0) {
            $status = 'Registro relacionado, imposible de eliminar';
        } else {
            $empresa->delete();
            return redirect('empresa')->with('good', $status);
        }
        return redirect('empresa')->with('err', $status);   
    }
}
