@extends('layouts.app')

@section('title')
    <a href="{{route('carril.nuevo')}}" class="btn btn-info py-1 btn-block">Agregar Carril-Anden</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Carril-Anden</li>
@endsection

@section('content')

<div style="overflow-x:auto;">
    <table class="table table-striped">
        <thead class="th-dark">
            <tr>
                <th>#</th>
                <th>Carril</th>
                <th>Anden</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $cont = 1; ?>
        @foreach($carriles as $carril)
            <tr>
                <td><b>{{ $cont++ }}</b></td>
                <td>{{ $carril->carril }}</td>
                <td>{{ $carril->anden }}</td>
                <td>
                    <div class="row justify-content-start">
                        <div class="col-4">
                            <a href="{{route('carril.editar', $carril)}}"><input type=image src="{{asset('images/edit.png')}}" width="20" height="20"></a>
                        </div>
                        <div class="col-4">
                            <form action="{{route('carril.eliminar', $carril)}}" method="POST">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}

                                <input type=image src="{{asset('images/delete.png')}}" width="20" height="20" onclick="return confirm('Esta seguro de eliminar el Carril con id: {{ $carril->id}}')">
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