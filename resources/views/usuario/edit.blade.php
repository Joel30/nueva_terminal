@extends('layouts.basic')

@section('content')

    @if($errors->any())
        <div calss="">
            <ul>
            @foreach($errors->all() as $error)
                <il>
                    {{$error}}
                </il>
            @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('usuario.actualizar', $usuario)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}


        <label for="personal_id">Nombre</label>
        <select name="personal_id" id="personal_id">
            @foreach($usuario->personal->all() as $personal)
                <option value="{{$personal->id}}" {{ old('personal_id', $usuario->personal_id) == $personal->id ? 'selected' : ''  }}>{{$personal->nombre}} {{$personal->apellido_paterno}} {{$personal->apellido_materno}}</option>
            @endforeach
        </select> <br><br>
        
        <label for="email">E-mail</label>
        <input id="email" type="mail" name="email" value="{{ $usuario->email }}" required autofocus> <br><br>

        <label for="password">password</label>
        <input id="password" type="password" name="password"> <br><br>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection