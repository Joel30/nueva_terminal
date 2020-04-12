<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Personal;

class PersonalController extends Controller
{
    public function index()
    {
        $this->autorizacion('Administrador');

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
        $this->autorizacion('Administrador');

        $new_personal = new Personal;
        $new_personal->guardar(request());
        
        return redirect('personal/nuevo')->with('good', 'Registro exitoso');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->autorizacion('Administrador');

        $personal = Personal::find($id);
        return view('personal.edit', compact('personal'));
    }

    public function update(Personal $personal)
    {
        $this->autorizacion('Administrador');

        $new_personal = new Personal;
        $new_personal->actualizar(request(), $personal);
        return redirect('personal')->with('good', 'Modificación exitosa');
    }

    public function destroy(Personal $personal)
    {
        $this->autorizacion('Administrador');

        $status ='Eliminación exitosa';
        try {
            $personal->delete();
            return redirect('personal')->with('good', $status);
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'Registro relacionado, imposible de eliminar';
        }
        return redirect('personal')->with('err', $status);   
    }
}
