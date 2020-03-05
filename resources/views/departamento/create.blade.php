@extends('layouts.basic')

@section('content')
    <form method="POST" action="{{url(route('departamento.guardar'))}}">
        
        {{ csrf_field() }}
        
        <label for="nombre">nombre</label>
        <input id="nombre" type="text" name="nombre" value="{{ old('nombre')  }}" required autofocus> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection