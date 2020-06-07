@extends('layouts.app')

@section('title')
    Departamentos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Departamento</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('departamento.nuevo')}}" class="btn btn-success py-1 mb-3">
            <i class="fa fa-plus fa-fw"></i>
            Agregar Departamento
        </a>
    </div>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Destino</th>
                <th>Transporte</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departamentos as $departamento)
            <tr>
                <td></td>
                <td>{{ $departamento->destino }}</td>
                <td>{{ $departamento->tipo }}</td>
                <td>
                    <a href="{{route('departamento.editar', $departamento)}}" class="btn btn-outline-warning py-0 px-1 my-0 mr-3" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{route('departamento.eliminar', $departamento)}}" class="btn btn-outline-danger py-0 px-1" title="Eliminar" onclick="return confirm('Esta seguro de eliminar el departamneto: {{$departamento->destino}}?')"><i class="fa fa-trash"></i></a>  
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection