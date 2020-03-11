@extends('layouts.app')

@section('title')
    <h4 class="page-title">Carril - Anden</h4>
@endsection

@section('breadcrumb')
    <li class="active">Carril-Anden</li>
@endsection

@section('content')

    <div>
        <a href="{{route('carril.nuevo')}}" class="btn btn-primary mb-3">Nuevo</a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Carril</th>
                <th>Anden</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carriles as $carril)
            <tr>
                <td>{{ $carril->carril }}</td>
                <td>{{ $carril->anden }}</td>
                <td>
                <div class="row">
                    <a class="btn btn-warning btn-sm mb-2 py-0 px-3 mr-2" href="{{route('carril.editar', $carril)}}"> Editar </a>
                    <form action="{{route('carril.eliminar', $carril)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="input" class="btn btn-danger mb-2 btn-sm py-0"  onclick="return confirm('Esta seguro de eliminar el carril con id: {{ $carril->id}}')">Eliminar</button>
                    </form>
                </div>                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection