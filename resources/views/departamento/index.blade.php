@extends('layouts.app')

@section('title')
    <h4 class="page-title">Departamento</h4>
@endsection

@section('breadcrumb')
    <li class="active">Departamento</li>
@endsection

@section('content')

    <div>
        <a href="{{route('departamento.nuevo')}}" class="btn btn-primary mb-3">Nuevo</a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departamentos as $departamento)
            <tr>
                <td>{{ $departamento->nombre }}</td>
                <td>
                <div class="row">
                    <a class="btn btn-warning btn-sm mb-2 py-0 px-3 mr-2" href="{{route('departamento.editar', $departamento)}}"> Editar </a>
                    <form action="{{route('departamento.eliminar', $departamento)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="input" class="btn btn-danger mb-2 btn-sm py-0"  onclick="return confirm('Esta seguro de eliminar el departamento con id: {{ $departamento->id}}')">Eliminar</button>
                    </form>
                </div>                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection