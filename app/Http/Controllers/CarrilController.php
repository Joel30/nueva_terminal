<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carril;

class CarrilController extends Controller
{
    public function index()
    {
        $this->autorizacion('Encargado');

        $carriles = Carril::all();
        return view('carril.index', compact('carriles'));
    }

    public function create()
    {
        $this->autorizacion('Encargado');

        return view('carril.create');
    }

    public function store()
    {
        $this->autorizacion('Encargado');

        $carril = new Carril;
        $carril->guardar(request());

        return redirect('carril/nuevo')->with('good', 'Registro exitoso');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->autorizacion('Encargado');

        $carril = Carril::find($id);
        return view('carril.edit', compact('carril'));
    }

    public function update(Carril $carril)
    {
        $this->autorizacion('Encargado');

        $new_carril = new Carril;
        $new_carril->actualizar(request(), $carril);
        return redirect('carril')->with('good', 'Modificación exitosa');
    }

    public function destroy(Carril $carril)
    {
        $this->autorizacion('Encargado');

        $status ='Eliminación exitosa';
        
        if(count($carril->transportes) > 0){
            $status = 'Registro relacionado, imposible de eliminar';
        } else {
            $carril->delete();
            return redirect('carril')->with('good', $status);
        }
        return redirect('carril')->with('err', $status);
    }
}
