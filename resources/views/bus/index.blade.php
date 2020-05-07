@extends('layouts.app')

@section('title')
    <a href="{{route('bus.nuevo')}}" class="btn btn-info py-1 btn-block">Agregar Bus</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Buses</li>
@endsection

@section('content')

<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead class="th-dark">
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
                
                    <a href="{{route('bus.editar', $bus)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                    <form action="{{route('bus.eliminar', $bus)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}

                        <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el Bus con id: {{ $bus->id}}')" title="Eliminar">
                    </form>
                      
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{ $buses->links() }}
@endsection