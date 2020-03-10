<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Personal;

class UserController extends Controller
{
    public function index()
    {
        $this->autorizacion('Administrador');

        $usuarios = User::all();
        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        $this->autorizacion('Administrador');

        $personal = Personal::all();
        return view('usuario.create', compact('personal'));
    }

    public function store()
    {
        $this->autorizacion('Administrador');

        $usuario = new User;
        $usuario->guardar(request());
        return redirect('usuario');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $this->autorizacion('Administrador');

        $usuario = User::find($id);
        return view('usuario.edit', compact('usuario'));
    }


    public function update(User $usuario)
    {
        $this->autorizacion('Administrador');

        $new_usuario = new User;
        $new_usuario->actualizar(request(), $usuario);
        return redirect('usuario');
    }

    public function destroy(User $usuario)
    {
        $this->autorizacion('Administrador');

        $usuario->delete();
        return redirect('usuario');
    }
}
