@extends('layouts.app')

@section('title')
    <a href="{{route('carril.nuevo')}}" class="btn btn-success py-1 btn-block">Agregar Carril-Anden</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Carril-Anden</li>
@endsection

@section('content')

    <table class="table table-striped" id="nt_table">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $cont = 1; ?>
        @foreach($carriles as $carril)
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $carril->anden }}</td>
                <td>{{ $carril->carril }}</td>
                <td>

                    <a href="{{route('carril.editar', $carril)}}" class="float-left pr-4"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20" title="Editar"></a>

                    <form action="{{route('carril.eliminar', $carril)}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}

                        <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el Carril con id: {{ $carril->id}}')" title="Eliminar">
                    </form>                      
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection