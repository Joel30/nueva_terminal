<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Personal;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        $personal = Personal::all();
        return view('usuario.create', compact('personal'));
    }

    public function store()
    {
        $usuario = new User;
        $usuario->guardar(request());
        return redirect('usuario');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuario.edit', compact('usuario'));
    }


    public function update(User $usuario)
    {
        $new_usuario = new User;
        $new_usuario->actualizar(request(), $usuario);
        return redirect('usuario');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect('usuario');
    }
}
