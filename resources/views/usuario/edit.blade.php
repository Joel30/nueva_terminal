@extends('layouts.basic')

@section('content')

    <form method="POST" action="{{route('usuario.actualizar', $usuario)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="personal_id">Destino</label>
        <select name="personal_id" id="personal_id">
            @foreach($usuario->personal->all() as $personal)
                <option value="{{$personal->id}}" {{ old('personal_id', $usuario->personal_id) == $personal->id ? 'selected' : ''  }}>{{$personal->nombre}} {{$personal->apellido_paterno}} {{$personal->apellido_materno}}</option>
            @endforeach
        </select> <br><br>
        
        <label for="email">E-mail</label>
        <input id="email" type="mail" name="email" value="{{ $personal->email }}" required autofocus> <br><br>

        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection