@extends('layouts.app')

@section('title')
    Lista de Transportes
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Lista de Transporte</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('transporte.nuevo')}}" class="boton btn-green py-1 mb-3">
            <i class="fa fa-plus fa-fw"></i>
            Agregar
        </a>
    </div>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table2">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Destino</th>
                <th>Empresa de Transporte</th>
                <th>Telefono</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Bus</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
    </table>

@endsection