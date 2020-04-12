@extends('layouts.app')

@section('title')
    <a href="{{route('empresa.nuevo')}}" class="btn btn-info py-1 btn-block">Agregar Empresa</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Empresa de Transporte</li>
@endsection

@section('content')

<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Numero de Oficina</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Responsable</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $cont = 1;?>
        @foreach($empresas as $empresa)
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->nro_oficina }}</td>
                <td>{{ $empresa->telefono }}</td>
                <td>{{ $empresa->celular }}</td>
                <td>{{ $empresa->responsable }}</td>
                <td>  

                    <a href="{{route('empresa.editar', $empresa)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                    <form action="{{route('empresa.eliminar', $empresa)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}

                        <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar la Empresa de Transporte con id: {{ $empresa->id}}')" title="Eliminar">
                    </form>
                 
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection