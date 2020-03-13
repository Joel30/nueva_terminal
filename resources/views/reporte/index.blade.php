@extends('layouts.app')

@section('title')
    REPORTES
@endsection

@section('breadcrumb')
    <li class="active">&nbsp;/ Reportes</li>
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

    @if(isset($transportes))
    <div>
        <p>Busqueda entre las fechas: {{$transportes->fecha_inicio}} y {{$transportes->fecha_fin}}</p>
    </div>
    @endif
    <div style="overflow-x:auto;">
        <table class="table table-striped">
        <thead class="thead-dark">
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
        

        @if(isset($transportes))
            <?php $cont = 1; ?>
            @foreach($transportes as $transporte)
            
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $transporte->departamento->nombre }}</td>
                <td>{{ $transporte->empresa->nombre }}</td>
                <td>{{ $transporte->carril->anden }}</td>
                <td>{{ $transporte->carril->carril }}</td>
                <td>{{ $transporte->bus->tipo_bus }}</td>
                <td>{{ $transporte->fecha }}</td>
                <td>{{ $transporte->hora }}</td>
                <td>{{ $transporte->estado }}</td>
                <td>{{ $transporte->llegada_salida == 1 ? 'Llegada' : 'Salida'}}</td>

            </tr>
            @endforeach
        @endif
        </tbody>
        </table>
    </div>    

@endsection