@extends('layouts.app')

@section('title')
    <a href="{{route('bus.nuevo')}}" class="btn btn-success py-1 btn-block">Agregar Bus</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Buses</li>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table1" >
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Empresa de Transporte</th>
                <th>Tipo de Bus</th>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
    </table>


@endsection