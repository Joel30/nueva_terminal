@extends('layouts.app')

@section('title')
    <a href="{{route('personal.nuevo')}}" class="btn btn-outline-primary py-1 btn-block">AGREGAR PERSONAL</a>
@endsection

@section('breadcrumb')
    <li class="active">&nbsp;/ Personal</li>
@endsection

@section('content')
<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
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
        <?php $cont = 1; ?>
        @foreach($personal as $personal)
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $personal->nombre }}</td>
                <td>{{ $personal->ci }}</td>
                <td>{{ $personal->fecha_nacimiento }}</td>
                <td>{{ $personal->celular }}</td>
                <td>{{ $personal->direccion }}</td>
                <td>{{ $personal->cargo }}</td>

                <td>    
                    <div class="row justify-content-start">
                        <div class="col-4">
                            <a href="{{route('personal.editar', $personal)}}"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20"></a>

                        </div>
                        <div class="col-4">
                            <form action="{{route('personal.eliminar', $personal)}}" method="POST">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}

                                <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar al Personal con id: {{ $personal->id}}')">
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