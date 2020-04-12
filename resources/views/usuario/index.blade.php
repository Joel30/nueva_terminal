@extends('layouts.app')

@section('title')
    <a href="{{route('usuario.nuevo')}}" class="btn btn-info py-1 btn-block">Agregar Usuario</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Usuarios</li>
@endsection

@section('content')

<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>E-mail</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $cont = 1; ?>
        @foreach($usuarios as $usuario)
            <tr>
                <td><b>{{ $cont++ }}</b</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->personal->nombre.' '.$usuario->personal->apellido_paterno.' '.$usuario->personal->apellido_materno}}</td>

                <td> 

                    <a href="{{route('usuario.editar', $usuario)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                    <form action="{{route('usuario.eliminar', $usuario)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}

                        <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar al Usuario con id: {{ $usuario->id}}')" title="Eliminar">
                    </form>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection