@extends('layouts.app')

@section('title')
    Tablero ({{$fecha}})
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Tablero</li>
@endsection

@section('box')
    <div class="col-12 col-sm-6">
        <div class="row justify-content-sm-start">
            <a href="{{route('viaje.index')}}" class="boton btn-blue py-1 mb-2 mr-4">
                <i class="fa fa-chevron-left fa-fw"></i>
                Regresar
            </a>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="row justify-content-end">
            <form class="form-inline" method="get" action="{{route('viaje.registro_anterior')}}" onsubmit="prevent_multiple_submits()">
                <div class="input-group input-group-sm mb-3">
                    <input type="date" max="{{Carbon\Carbon::now()->subDays(1)->format('Y-m-d')}}" class="form-control" name="fecha" required>
                    <div class="input-group-append">
                        <button class="btn btn-dark pr-1" id="register_btn" type="submit" ><i class="fa fa-search fa-fw"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('content')
<form method="POST" action="{{route('viaje.copia_registros')}}" onsubmit="prevent_multiple_submits()">
    {{ csrf_field() }}
    <div style="overflow-x:auto">

    <table class="table table-striped">
        <thead class="th-dark">
            <tr>
                <th><input type="checkbox" id="selectall" name="item"></th>
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
        <?php $cont = 1; ?>
        @foreach($viajes as $viaje)
            <tr>
                <td><input type="checkbox" name="item{{$cont++}}" class="case" value="{{$viaje->id}}"></td>
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
                    <a href="{{route('viaje.editar', $viaje)}}?copia=true" class="boton btn-outline-green py-0 px-1 my-0 mr-3" title="Copiar"><i class="fa fa-copy"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <div class="row justify-content-center">
    <button id="copy_btn" type="submit" class="boton btn-green-let py-1 mt-2 mr-3">
            <i class="fa fa-edit fa-fw p-0"></i>
        Copiar a hoy
    </button>
</div>
</form>


@endsection