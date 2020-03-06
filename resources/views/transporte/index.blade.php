@extends('layouts.app')

@section('content')

    <div>
        <a href="{{route('transporte.nuevo')}}" class="btn btn-primary mb-3">Nuevo</a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Destino</th>
                <th>Empresa de Transporte</th>
                <th>Telefono</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Tipo de Bus</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>salida/llegada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transportes as $transporte)
            <tr>
                <td>{{ $transporte->departamento->nombre }}</td>
                <td>{{ $transporte->empresa->nombre }}</td>
                <td>{{ $transporte->empresa->telefono }}</td>
                <td>{{ $transporte->carril->anden }}</td>
                <td>{{ $transporte->carril->carril }}</td>
                <td>{{ $transporte->bus->tipo_bus }}</td>
                <td>{{ $transporte->fecha }}</td>
                <td>{{ $transporte->hora }}</td>
                <td>{{ $transporte->estado }}</td>
                <td>{{ $transporte->llegada_salida == 1 ? 'Llegada' : 'Salida'}}</td>

                <td>
                <div class="row">
                    <a class="btn btn-warning btn-sm mb-2 py-0 px-3 mr-2" href="{{route('transporte.editar', $transporte)}}"> Editar </a>
                    <form action="{{route('transporte.eliminar', $transporte)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="input" class="btn btn-danger mb-2 btn-sm py-0"  onclick="return confirm('Esta seguro de eliminar al transporte con id: {{ $transporte->id}}')">Eliminar</button>
                    </form>
                </div>                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection