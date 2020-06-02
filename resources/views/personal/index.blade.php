@extends('layouts.app')

@section('title')
    <a href="{{route('personal.nuevo')}}" class="btn btn-success py-1 btn-block">Agregar Personal</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Personal</li>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>C. I.</th>
                <th>Fecha Nacimiento</th>
                <th>Cleular</th>
                <th>Dirección</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $cont = 1; ?>
        @foreach($personal as $personal)
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $personal->nombre.' '.$personal->apellido_paterno.' '.$personal->apellido_materno }}</td>
                <td>{{ $personal->ci }}</td>
                <td>{{ $personal->fecha_nacimiento }}</td>
                <td>{{ $personal->celular }}</td>
                <td>{{ $personal->direccion }}</td>
                <td>{{ $personal->cargo }}</td>

                <td>    

                    <a href="{{route('personal.editar', $personal)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                    <form action="{{route('personal.eliminar', $personal)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}

                        <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar al Personal con id: {{ $personal->id}}')" title="Eliminar">
                    </form>
              
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection