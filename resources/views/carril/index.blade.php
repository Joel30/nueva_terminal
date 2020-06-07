@extends('layouts.app')

@section('title')
    Carril - Anden
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Carril-Anden</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('carril.nuevo')}}" class="btn btn-success py-1 mb-3">
            <i class="fa fa-plus fa-fw"></i>
            Agregar Carril
        </a>
    </div>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carriles as $carril)
            <tr>
                <td></td>
                <td>{{ $carril->anden }}</td>
                <td>{{ $carril->carril }}</td>
                <td>
                    <a href="{{route('carril.editar', $carril)}}" class="btn btn-outline-warning py-0 px-1 my-0 mr-3" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{route('carril.eliminar', $carril)}}" class="btn btn-outline-danger py-0 px-1" title="Eliminar" onclick="return confirm('Esta seguro de eliminar el registro?')"><i class="fa fa-trash"></i></a>                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection