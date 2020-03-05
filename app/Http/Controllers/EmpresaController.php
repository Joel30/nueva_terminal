<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();

        return view('empresa.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresa.create');
    }

    public function store()
    {
        $new_empresa = new Empresa;
        $new_empresa->guardar(request());

        return redirect('empresa/nuevo');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('empresa.edit', compact('empresa'));
    }

    public function update(Empresa $empresa)
    {
        $new_empresa = new Empresa;
        $new_empresa->actualizar(request(), $empresa);

        return redirect('empresa');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect('empresa');
    }
}
