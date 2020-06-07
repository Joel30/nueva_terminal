@extends('layouts.app')

@section('title')
    Usuarios
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Usuarios</li>
@endsection

@section('box')
    <div class="mr-3">
        <a href="{{route('usuario.nuevo')}}" class="btn btn-success py-1 mb-3">
            <i class="fa fa-plus fa-fw"></i>
            Agregar Usuario
        </a>
    </div>
    <div class="">
      
        <a href="{{route('papelera.usuario')}}" class="btn btn-outline-light py-1 mb-3">
            <i class="fa fa-trash-o fa-fw"></i>
            Registros Eliminados
        </a>

    </div>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>E-mail</th>
                <th>Nombre</th>
                <th>Acciones</th>
                <th class="bg-secondary">Cargo</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td></td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->personal->nombre.' '.$usuario->personal->apellido_paterno.' '.$usuario->personal->apellido_materno}}</td>
                <td class="text-center">
                    <a href="{{route('usuario.editar', $usuario)}}" class="btn btn-outline-warning py-0 px-1 my-0 mr-3" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{route('usuario.eliminar', $usuario)}}" class="btn btn-outline-danger py-0 px-1" title="Eliminar" onclick="return confirm('Esta seguro de eliminar al Usuario: {{$usuario->email}}?')"><i class="fa fa-trash"></i></a>
                </td>
                <td>{{ $usuario->personal->cargo }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection