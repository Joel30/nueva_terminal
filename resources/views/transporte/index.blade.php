@extends('layouts.app')

@section('title')
    <a href="{{route('transporte.nuevo')}}" class="btn btn-success py-1 btn-block">Agregar</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Lista de Transporte</li>
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