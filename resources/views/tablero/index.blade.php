@extends('layouts.app')

@section('title')

<div class="row">
    <div class="col">
        <a href="{{route('viaje.nuevo')}}" class="btn btn-success py-1 btn-block">Agregar</a>
    </div>
    <div class="col">
        <a href="{{route('viaje.tablero')}}" class="nav-link"><i class="fa fa-eye text-danger" aria-hidden="true"></i></a>
    </div>  
</div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Tablero</li>
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
        <?php $cont = 1; ?>
        @foreach($viajes as $viaje)
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $viaje->transporte->departamento->destino }}</td>
                <td>{{ $viaje->transporte->bus->empresa->nombre }}</td>
                <td>{{ $viaje->transporte->bus->empresa->telefono }}</td>
                <td>{{ $viaje->transporte->carril->anden }}</td>
                <td>{{ $viaje->transporte->carril->carril }}</td>
                <td>{{ $viaje->transporte->bus->tipo_bus }}</td>
                <td>{{ $viaje->fecha }}</td>
                <td>{{ $viaje->hora }}</td>
                <td>{{ $viaje->estado }}</td>
                <td>{{ $viaje->llegada_salida == 1 ? 'Llegada' : 'Salida'}}</td>

                <td>

                    <a href="{{route('viaje.editar', $viaje)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                    <form action="{{route('viaje.eliminar', $viaje)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}

                        <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el viaje con id: {{ $viaje->id}}')" title="Eliminar">
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection