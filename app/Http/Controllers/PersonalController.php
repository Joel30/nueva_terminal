<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Personal;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::select(
            'id', 
            (
                DB::raw("CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno) AS nombre")
            ), 
            'ci',
            'fecha_nacimiento', 
            'celular',
            'direccion', 
            'cargo')
            ->get();
        return view('personal.index', compact('personal'));
    }

    public function create()
    {
        return view('personal.create');
    }

    public function store()
    {
        $new_personal = new Personal;
        $new_personal->guardar(request());
        
        return redirect('personal/nuevo');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $personal = Personal::find($id);
        return view('personal.edit', compact('personal'));
    }

    public function update(Personal $personal)
    {
        $new_personal = new Personal;
        $new_personal->actualizar(request(), $personal);
        return redirect('personal');
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect('personal');
    }
}
