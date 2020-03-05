@extends('layouts.app')

@section('content')

    <div>
        <a href="{{route('bus.nuevo')}}" class="btn btn-primary mb-3">Nuevo</a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Tipo de Bus</th>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($buses as $bus)
            <tr>
                <td>{{ $bus->tipo_bus }}</td>
                <td>{{ $bus->placa }}</td>
                <td>{{ $bus->modelo }}</td>
                <td>{{ $bus->color }}</td>
                <td>
                <div class="row">
                    <a class="btn btn-warning btn-sm mb-2 py-0 px-3 mr-2" href="{{route('bus.editar', $bus)}}"> Editar </a>
                    <form action="{{route('bus.eliminar', $bus)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="input" class="btn btn-danger mb-2 btn-sm py-0"  onclick="return confirm('Esta seguro de eliminar el Bus con id: {{ $bus->id}}')">Eliminar</button>
                    </form>
                </div>

                    <!--a class="badge badge-pill badge-danger" href="{{route('bus.eliminar', $bus)}}" onclick="return confirm('Esta seguro de eliminar a la Bus con id: {{ $bus->id}}')"> Eliminar </a-->

                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection