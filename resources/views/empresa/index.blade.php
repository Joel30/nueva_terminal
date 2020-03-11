@extends('layouts.app')

@section('title')
    <h4 class="page-title">Empresa de Transporte</h4>
@endsection

@section('breadcrumb')
    <li class="active">Empresa de Transporte</li>
@endsection

@section('content')

    <div>
        <a href="{{route('empresa.nuevo')}}" class="btn btn-primary mb-3">Nuevo</a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Nombre</th>
                <th>Numero de Oficina</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Responsable</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->nro_oficina }}</td>
                <td>{{ $empresa->telefono }}</td>
                <td>{{ $empresa->celular }}</td>
                <td>{{ $empresa->responsable }}</td>
                <td>
                <div class="row">
                    <a class="btn btn-warning btn-sm mb-2 py-0 px-3 mr-2" href="{{route('empresa.editar', $empresa)}}"> Editar </a>
                    <form action="{{route('empresa.eliminar', $empresa)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="input" class="btn btn-danger mb-2 btn-sm py-0"  onclick="return confirm('Esta seguro de eliminar la empresa con id: {{ $empresa->id}}')">Eliminar</button>
                    </form>
                </div>                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection