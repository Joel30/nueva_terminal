<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Empresa;

class BusController extends Controller
{
    public function index()
    {
        $this->autorizacion('Encargado');

        $buses = Bus::all();
        return view('bus.index', compact('buses'));
    }

    public function create()
    {
        $this->autorizacion('Encargado');

        $empresas = Empresa::orderBy('nombre')->get();
        return view('bus.create', compact('empresas'));
    }

    public function store()
    {
        $this->autorizacion('Encargado');

        $bus = new Bus;
        $bus->guardar(request());

        return redirect('bus/nuevo')->with('good', 'Registro exitoso');


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->autorizacion('Encargado');

        $bus = Bus::find($id);
        return view('bus.edit', compact('bus'));
    }

    public function update(Bus $bus)
    {
        $this->autorizacion('Encargado');

        $new_bus = new Bus;
        $new_bus->actualizar(request(), $bus);

        return redirect('bus')->with('good', 'Modificación exitosa');
    }

    public function destroy(Bus $bus)
    {
        $this->autorizacion('Encargado');

        $status ='Eliminación exitosa';
        try {
            $bus->delete();
            return redirect('bus')->with('good', $status);
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'Registro relacionado, imposible de eliminar';
        }
        return redirect('bus')->with('err', $status);
    }
}
