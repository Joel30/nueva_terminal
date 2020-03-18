@extends('layouts.app')

@section('title')
    REPORTES
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Reportes</li>
@endsection

@section('content')

    <form  method="POST" action="{{route('reporte.buscar')}}">
    {{ csrf_field() }}
        <div class="col-8">
            <div class="input-group">
                <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio" required>
                <input type="date"  name="fecha_fin" class="form-control" id="fecha_fin" required>
                <div class="input-group-append"><button type="submit" class="input-group-text">Enviar</button></div>
            </div>
            
        </div> <br>
        
    </form>

    @if(isset($viajes))
    <div>
        <p>Busqueda entre las fechas: {{$viajes->fecha_inicio}} y {{$viajes->fecha_fin}}</p>
    </div>
    @endif
    <div style="overflow-x:auto;">
        <table class="table table-striped">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Destino</th>
                <th>Empresa de Transporte</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Tipo de Bus</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>salida/llegada</th>
            </tr>
        </thead>
        <tbody id="resultados">
        

        @if(isset($viajes))
            <?php $cont = 1; ?>
            @foreach($viajes as $viaje)
            
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $viaje->transporte->departamento->nombre }}</td>
                <td>{{ $viaje->transporte->empresa->nombre }}</td>
                <td>{{ $viaje->transporte->carril->anden }}</td>
                <td>{{ $viaje->transporte->carril->carril }}</td>
                <td>{{ $viaje->transporte->bus->tipo_bus }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>{{ $viaje->hora }}</td>
                <td>{{ $viaje->estado }}</td>
                <td>{{ $viaje->llegada_salida == 1 ? 'Llegada' : 'Salida'}}</td>

            </tr>
            @endforeach
        @endif
        </tbody>
        </table>
    </div>    

@endsection