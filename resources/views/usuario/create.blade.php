@extends('layouts.basic')

@section('content')
    <form method="POST" action="{{route('usuario.guardar')}}">
        
        {{ csrf_field() }}
        
        <label for="personal_id">Nombre</label>
        <select name="personal_id" id="personal_id">
            @foreach($personal as $personal)
                <option value="{{$personal->id}}" {{ old('personal_id')=='$personal->id' ? 'selected' : ''  }}>{{$personal->nombre}} {{$personal->apellido_paterno}} {{$personal->apellido_materno}}</option>
            @endforeach
        </select> <br><br>

        <label for="email">E-mail</label>
        <input id="email" type="mail" name="email" value="{{ old('email')  }}" required autofocus> <br><br>
        
        <label for="password">password</label>
        <input id="password" type="password" name="password" required> <br><br>

        <label for="password-confirm" >Confirm Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection