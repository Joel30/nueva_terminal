@extends('layouts.app')

@section('title')
    Tablero
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Tablero</li>
@endsection

@section('box')
    @if(request()->otros == null)
        <div class="mr-3">
            <a href="{{route('viaje.nuevo')}}" class="btn btn-success py-1 mb-3">
                <i class="fa fa-plus fa-fw"></i>
                Agregar Registro
            </a>
        </div>
        <div class="mr-5">
            <a href="{{route('viaje.tablero')}}" class="btn btn-outline-danger py-1 px-2" target="_blank" title="Visualizar Monitor"><i class="fa fa-eye" aria-hidden="true"></i></a>
        </div>
        <div class="row ml-0">
            <form method="get" action="{{route('viaje.registro_anterior')}}" class="form-inline" onsubmit="prevent_multiple_submits()">
                <input type="hidden" name="fecha" value="fecha_actual">
                <button type="submit" class="btn btn-light  py-1 mb-3 mr-3" id="register_btn">
                    <i class="fa fa-table fa-fw"></i>
                    registros anteriores
                </button>
            </form>
        
            <a href="{{route('viaje.index')}}?otros=true" class="btn btn-light py-1 mb-3">
                <i class="fa fa-table fa-fw"></i>
                Otros
            </a>        
        </div>
    @else 
        <div class="">
            <a href="{{route('viaje.index')}}"  class="btn btn-info py-1 mb-3">
                <i class="fa fa-chevron-left fa-fw"></i>
                Regresar
            </a>
        </div>
    @endif 
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Destino</th>
                <th>Empresa de Transporte</th>
                <th>Teléfono</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Bus</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>salida / llegada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody >
        @foreach($viajes as $viaje)
            <tr>
                <td></td>
                <td>{{ $viaje->transporte->departamento->destino }}</td>
                <td>{{ $viaje->transporte->bus->empresa->nombre }}</td>
                <td>{{ $viaje->transporte->bus->empresa->telefono }}</td>
                <td>{{ $viaje->transporte->carril->anden }}</td>
                <td>{{ $viaje->transporte->carril->carril }}</td>
                <td>{{ $viaje->transporte->bus->tipo_bus }}</td>
                <td>{{ Carbon\Carbon::parse($viaje->fecha)->format('d/m/Y')}}</td>
                <td>{{ Carbon\Carbon::parse($viaje->hora)->format('H:i') }}</td>
                <td>{{ $viaje->estado }}</td>
                <td>{{ $viaje->llegada_salida}}</td>

                <td>
                    <a href="{{route('viaje.editar', $viaje)}}" class="btn btn-outline-warning py-0 px-1 my-0 mr-3" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{route('viaje.eliminar', $viaje)}}" class="btn btn-outline-danger py-0 px-1" title="Eliminar" onclick="return confirm('Esta seguro de eliminar el registro?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection