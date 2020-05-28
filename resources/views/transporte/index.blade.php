@extends('layouts.app')

@section('title')
    <a href="{{route('transporte.nuevo')}}" class="btn btn-success py-1 btn-block">Agregar</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Lista de Transporte</li>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Destino</th>
                <th>Empresa de Transporte</th>
                <th>Telefono</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Bus</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $cont = 1; ?>
            @foreach($transportes as $transporte)
                <tr>
                    <td><b>{{ $cont++ }}</b></td>
                    <td>{{ $transporte->departamento->destino }}</td>
                    <td>{{ $transporte->bus->empresa->nombre }}</td>
                    <td>{{ $transporte->bus->empresa->telefono }}</td>
                    <td>{{ $transporte->carril->anden }}</td>
                    <td>{{ $transporte->carril->carril }}</td>
                    <td>{{ $transporte->bus->tipo_bus }}</td>
                    <td>{{ $transporte->hora }}</td>
                    <td>{{ $transporte->estado }}</td>

                    <td>
                        <a href="{{route('transporte.editar', $transporte)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                        <form action="{{route('transporte.eliminar', $transporte)}}" method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}

                            <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el Transporte con id: {{ $transporte->id}}')" title="Eliminar">
                        </form>                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection