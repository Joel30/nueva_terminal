@extends('layouts.app')

@section('title')
    Buses
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Buses</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('bus.nuevo')}}" class="boton btn-green py-1 mb-3">
            <i class="fa fa-plus fa-fw"></i>
            Agregar Bus
        </a>
    </div>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table1" >
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Empresa de Transporte</th>
                <th>Tipo de Bus</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
    </table>


@endsection