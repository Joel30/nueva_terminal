<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $usuarios = User::onlyTrashed()
            ->join('personal', 'personal.id', '=', 'users.personal_id')
            ->select('users.id','email','personal_id', 'personal.cargo',
            (DB::raw('DATE_FORMAT(users.deleted_at, "%d/%m/%Y %H:%i") as hora')), 
            (DB::raw('CONCAT(personal.nombre," ",personal.apellido_paterno," ",personal.apellido_materno) as nombre')))
            ->get();
        return datatables()
            ->of($usuarios)
            ->addIndexColumn()
            ->addColumn('btn','/papelera/usuario_actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function personal_papelera() 
    {
        $personal = Personal::onlyTrashed()
            ->select('id', 
                (DB::raw('CONCAT(nombre," ",apellido_paterno," ",apellido_materno) as nombre')),
                'ci', 
                (DB::raw('DATE_FORMAT(fecha_nacimiento, "%d/%m/%Y") as fecha_nacimiento')),
                'celular', 'direccion', 'cargo', 
                (DB::raw('DATE_FORMAT(deleted_at, "%d/%m/%Y %H:%i") as hora')))
            ->get();
        return datatables()
            ->of($personal)
            ->addIndexColumn()
            ->addColumn('btn','/papelera/personal_actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function restore_usuario($id) 
    {
        $this->autorizacion('Administrador');

        $user = User::onlyTrashed()->findOrFail($id);
        if($user->personal->deleted_at == null){
            $user->restore();
        } else {
            Personal::onlyTrashed()->findOrFail($user->personal_id)->restore();
            $user->restore();
        }
        return redirect('usuario/papelera')->with('good', 'Restauración exitosa');
    }

    public function restore_personal($id) 
    {
        $this->autorizacion('Administrador');

        Personal::onlyTrashed()->findOrFail($id)->restore();
        return redirect('personal/papelera')->with('good', 'Restauración exitosa');
    }
}
