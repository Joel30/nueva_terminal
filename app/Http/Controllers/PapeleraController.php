<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\User;

class PapeleraController extends Controller
{
    public function usuario() 
    {
        $this->autorizacion('Administrador');

        return view('papelera.usuario');
    }

    public function personal() 
    {
        $this->autorizacion('Administrador');

        return view('papelera.personal');
    }

    public function usuario_papelera() 
    {
        //$this->autorizacion('Administrador');

        $usuarios = User::onlyTrashed()->with('personal:id,nombre,apellido_materno,apellido_paterno')->get();
        return datatables()
            ->of($usuarios)
            ->addColumn('btn','/papelera/usuario_actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function personal_papelera() 
    {
        //$this->autorizacion('Administrador');

        $personal = Personal::onlyTrashed()->get();
        return datatables()
            ->of($personal)
            ->addColumn('btn','/papelera/personal_actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function restore_usuario($id) 
    {
        User::onlyTrashed()->findOrFail($id)->restore();
        return redirect('papelera/usuario');
    }

    public function restore_personal($id) 
    {
        Personal::onlyTrashed()->findOrFail($id)->restore();
        return redirect('papelera/personal');
    }
}
