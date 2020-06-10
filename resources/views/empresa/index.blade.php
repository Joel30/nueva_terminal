@extends('layouts.app')

@section('title')
    Empresa de Transporte
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Empresa de Transporte</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('empresa.nuevo')}}" class="boton btn-green py-1 mb-3">
            <i class="fa fa-plus fa-fw"></i>
            Agregar Empresa
        </a>
    </div>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Numero de Oficina</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Responsable</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td></td>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->nro_oficina }}</td>
                <td>{{ $empresa->telefono }}</td>
                <td>{{ $empresa->celular }}</td>
                <td>{{ $empresa->responsable }}</td>
                <td>  
                    <a href="{{route('empresa.editar', $empresa)}}" class="boton btn-outline-yellow py-0 px-1 my-0 mr-3" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{route('empresa.eliminar', $empresa)}}" class="boton btn-outline-red py-0 px-1" title="Eliminar" onclick="return confirm('Esta seguro de eliminar la Empresa de transporte: {{$empresa->nombre}}?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection