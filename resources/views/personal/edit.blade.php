@extends('layouts.basic')

@section('content')
    <form method="POST" action="{{route('personal.actualizar', $personal)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" value="{{$personal->nombre}}" required autofocus> <br><br>

        <label for="apellido_paterno">Apellido Paterno</label>
        <input id="apellido_paterno" type="text" name="apellido_paterno" value="{{$personal->apellido_paterno}}" required autofocus> <br><br>

        <label for="apellido_materno">Apellido Materno</label>
        <input id="apellido_materno" type="text" name="apellido_materno" value="{{$personal->apellido_materno}}" required autofocus> <br><br>

        <label for="ci">C. I.</label>
        <input id="ci" type="text" name="ci" value="{{$personal->ci}}" required autofocus> <br><br>

        <label for="fecha_nacimiento">Fecha Nacimiento</label>
        <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{$personal->fecha_nacimiento}}" required autofocus> <br><br>

        <label for="celular">Celular</label>
        <input id="celular" type="number" name="celular" value="{{$personal->celular}}" required autofocus> <br><br>

        <label for="direccion">Direccion</label>
        <input id="direccion" type="text" name="direccion" value="{{$personal->direccion}}" required autofocus> <br><br>

        <label for="cargo">Tipo de Bus</label>
        <select name="cargo" id="cargo">
            <option value="Encargado" {{ old('cargo', $personal->cargo)=='Encargado' ? 'selected' : ''  }}>Encargado</option>
            <option value="Administrador" {{ old('cargo', $personal->cargo)=='Administrador' ? 'selected' : ''  }}>Administrador</option> 
        </select> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection