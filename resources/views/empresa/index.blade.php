@extends('layouts.app')

@section('title')
    <a href="{{route('empresa.nuevo')}}" class="btn btn-outline-primary py-1 btn-block">AGREGAR EMPRESA</a>
@endsection

@section('breadcrumb')
    <li class="active">&nbsp;/ Empresa de Transporte</li>
@endsection

@section('content')

<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead class="thead-dark">
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
                    <div class="row justify-content-start">
                        <div class="col-4">
                            <a href="{{route('empresa.editar', $empresa)}}"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20"></a>

                        </div>
                        <div class="col-4">
                            <form action="{{route('empresa.eliminar', $empresa)}}" method="POST">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}

                                <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar la Empresa de Transporte con id: {{ $empresa->id}}')">
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