@extends('layouts.app')

@section('title')
    <h4 class="page-title">Personal</h4>
@endsection

@section('breadcrumb')
    <li class="active">Personal</li>
@endsection

@section('content')

    <div>
        <a href="{{route('personal.nuevo')}}" class="btn btn-primary mb-3">Nuevo</a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Nombre</th>
                <th>C. I.</th>
                <th>Fecha Nacimiento</th>
                <th>Cleular</th>
                <th>Dirección</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($personal as $personal)
            <tr>
                <td>{{ $personal->nombre }}</td>
                <td>{{ $personal->ci }}</td>
                <td>{{ $personal->fecha_nacimiento }}</td>
                <td>{{ $personal->celular }}</td>
                <td>{{ $personal->direccion }}</td>
                <td>{{ $personal->cargo }}</td>

                <td>
                <div class="row">
                    <a class="btn btn-warning btn-sm mb-2 py-0 px-3 mr-2" href="{{route('personal.editar', $personal)}}"> Editar </a>
                    <form action="{{route('personal.eliminar', $personal)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="input" class="btn btn-danger mb-2 btn-sm py-0"  onclick="return confirm('Esta seguro de eliminar al personal con id: {{ $personal->id}}')">Eliminar</button>
                    </form>
                </div>                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection