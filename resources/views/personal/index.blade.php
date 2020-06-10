@extends('layouts.app')

@section('title')
    Personal
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Personal</li>
@endsection

@section('box')

    <div class="mr-3">
        <a href="{{route('personal.nuevo')}}" class="boton btn-green py-1 mb-3">
            <i class="fa fa-plus fa-fw"></i>
            Agregar Personal
        </a>
    </div>
    <div class="">
      
        <a href="{{route('papelera.personal')}}" class="btn btn-outline-light py-1 mb-3">
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
        @foreach($personal as $personal)
            <tr>
                <td></td>
                <td>{{ $personal->nombre.' '.$personal->apellido_paterno.' '.$personal->apellido_materno }}</td>
                <td>{{ $personal->ci }}</td>
                <td>{{ $personal->fecha_nacimiento }}</td>
                <td>{{ $personal->celular }}</td>
                <td>{{ $personal->direccion }}</td>
                <td>{{ $personal->cargo }}</td>

                <td>    
                    <a href="{{route('personal.editar', $personal)}}" class="boton btn-outline-yellow py-0 px-1 my-0 mr-3" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{route('personal.eliminar', $personal)}}" class="boton btn-outline-red py-0 px-1" title="Eliminar" onclick="return confirm('Esta seguro de eliminar al personal con C.I.: {{$personal->ci}}?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection