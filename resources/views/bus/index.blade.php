@extends('layouts.app')

@section('title')
    <a href="{{route('bus.nuevo')}}" class="btn btn-outline-primary py-1 btn-block">AGREGAR BUS</a>
@endsection

@section('breadcrumb')
    <li class="active">&nbsp;/ Buses</li>
@endsection

@section('content')

<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Tipo de Bus</th>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $cont = 1;?>
        @foreach($buses as $bus)
            <tr>
                
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $bus->tipo_bus }}</td>
                <td>{{ $bus->placa }}</td>
                <td>{{ $bus->modelo }}</td>
                <td>{{ $bus->color }}</td>
                <td>
                    <div class="row justify-content-start">
                        <div class="col-4">
                            <a href="{{route('bus.editar', $bus)}}"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20"></a>
                        </div>
                        <div class="col-4">
                            <form action="{{route('bus.eliminar', $bus)}}" method="POST">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}

                                <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el Bus con id: {{ $bus->id}}')">
                            </form>
                        </div>
                    </div>            
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection