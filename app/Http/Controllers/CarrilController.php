<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carril;

class CarrilController extends Controller
{
    public function index()
    {
        $carriles = Carril::all();
        return view('carril.index', compact('carriles'));
    }

    public function create()
    {
        return view('carril.create');
    }

    public function store()
    {
        $carril = new Carril;
        $carril->guardar(request());

        return redirect('carril/nuevo');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $carril = Carril::find($id);
        return view('carril.edit', compact('carril'));
    }

    public function update(Carril $carril)
    {
        $new_carril = new Carril;
        $new_carril->actualizar(request(), $carril);
        return redirect('carril');
    }

    public function destroy(Carril $carril)
    {
        $carril->delete();
        return redirect('carril');
    }
}
