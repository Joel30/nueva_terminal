@extends('layouts.app')

@section('title')
    <a href="{{route('departamento.nuevo')}}" class="btn btn-success py-1 btn-block">Agregar Departamento</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Departamento</li>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Destino</th>
                <th>Transporte</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $cont = 1; ?>
        @foreach($departamentos as $departamento)
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $departamento->destino }}</td>
                <td>{{ $departamento->tipo }}</td>
                <td>

                    <a href="{{route('departamento.editar', $departamento)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                    <form action="{{route('departamento.eliminar', $departamento)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}

                        <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el Destino con id: {{ $departamento->id}}')" title="Eliminar">
                    </form>
                      
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection