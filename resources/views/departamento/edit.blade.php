@extends('layouts.basic')

@section('content')
    <form method="POST" action="{{route('departamento.actualizar', $departamento)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" value="{{$departamento->nombre}}" required autofocus> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection