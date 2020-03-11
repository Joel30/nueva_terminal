@extends('layouts.app')

@section('title')
    <h4 class="page-title">Usuarios</h4>
@endsection

@section('breadcrumb')
    <li class="active">Usuarios</li>
@endsection

@section('content')

    <div>
        <a href="{{route('usuario.nuevo')}}" class="btn btn-primary mb-3">Nuevo</a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>E-mail</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->personal->nombre.' '.$usuario->personal->apellido_paterno.' '.$usuario->personal->apellido_materno}}</td>

                <td>
                <div class="row">
                    <a class="btn btn-warning btn-sm mb-2 py-0 px-3 mr-2" href="{{route('usuario.editar', $usuario)}}"> Editar </a>
                    <form action="{{route('usuario.eliminar', $usuario)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="input" class="btn btn-danger mb-2 btn-sm py-0"  onclick="return confirm('Esta seguro de eliminar el usuario con id: {{ $usuario->id}}')">Eliminar</button>
                    </form>
                </div>                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection