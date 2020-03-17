@extends('layouts.app')

@section('title')
    <a href="{{route('departamento.nuevo')}}" class="btn btn-info py-1 btn-block">Agregar Departamento</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Departamento</li>
@endsection

@section('content')

<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $cont = 1; ?>
        @foreach($departamentos as $departamento)
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $departamento->nombre }}</td>
                <td>
                    <div class="row justify-content-start">
                        <div class="col-4">
                            <a href="{{route('departamento.editar', $departamento)}}"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20"></a>
                        </div>
                        <div class="col-4">
                            <form action="{{route('departamento.eliminar', $departamento)}}" method="POST">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}

                                <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el Destino con id: {{ $departamento->id}}')">
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