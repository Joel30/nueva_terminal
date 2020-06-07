@extends('layouts.app')

@section('title')
    Tablero ({{Carbon\Carbon::now()->subDays(1)->format('d-m-y')}})
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Tablero</li>
@endsection

@section('box')
    <div class="">
        <a href="javascript:history.back(-1);" class="btn btn-info py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
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
                    <a href="{{route('viaje.editar', $viaje)}}?copia=true" class="btn btn-outline-info py-0 px-1 my-0 mr-3" title="Copear"><i class="fa fa-copy"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <div class="row justify-content-center">
    <button id="copy_btn" type="submit" class="btn btn-info py-1 mt-2 mr-3">
            <i class="fa fa-edit fa-fw p-0"></i>
        Copear a hoy
    </button>
</div>
</form>


@endsection