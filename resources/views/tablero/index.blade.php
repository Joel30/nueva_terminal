@extends('layouts.app')

@section('title')
    Tablero
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Tablero</li>
@endsection

@section('box')
    @if(request()->otros == null)
        <div class="col-12 col-sm-6">
            <div class="row justify-content-sm-start">
                <div class="mr-3 ">
                    <a href="{{route('viaje.nuevo')}}" class="boton btn-green py-1 mb-3">
                        <i class="fa fa-plus fa-fw"></i>
                        Agregar Registro
                    </a>
                </div>
                <div>
                    <a href="{{route('viaje.tablero')}}" class="boton btn-outline-red py-1 mb-3 px-2" target="_blank" title="Visualizar Monitor"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="row justify-content-sm-end">
                <form method="get" action="{{route('viaje.registro_anterior')}}" class="form-inline" onsubmit="prevent_multiple_submits()">
                    <input type="hidden" name="fecha" value="fecha_actual">
                    <button type="submit" class="boton btn-green-let  py-1 mb-3 mr-3" id="register_btn">
                        <i class="fa fa-copy fa-fw"></i>
                        Registro Anterior
                    </button>
                </form>
            
                <a href="{{route('viaje.index')}}?otros=true" class="boton btn-green-let py-1 mb-3">
                    <i class="fa fa-calendar-o fa-fw"></i>
                    Otros
                </a>        
            </div>
        </div>   
    @else 
        <div class="">
            <a href="{{route('viaje.index')}}"  class="boton btn-blue py-1 mb-3">
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
                    <a href="{{route('viaje.editar', $viaje)}}" class="boton btn-outline-yellow py-0 px-1 my-0 mr-3" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{route('viaje.eliminar', $viaje)}}" class="boton btn-outline-red py-0 px-1" title="Eliminar" onclick="return confirm('Esta seguro de eliminar el registro?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection