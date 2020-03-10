@extends('layouts.basic')

@section('content')
    <form method="POST" action="{{route('personal.guardar')}}">
        
        {{ csrf_field() }}
        
        <label for="nombre">nombre</label>
        <input id="nombre" type="text" name="nombre" value="{{ old('nombre')  }}" required autofocus> <br><br>
        
        <label for="apellido_paterno">Apellido Paterno</label>
        <input id="apellido_paterno" type="text" name="apellido_paterno" value="{{ old('apellido_paterno')  }}" required autofocus> <br><br>

        <label for="apellido_materno">Apellido Materno</label>
        <input id="apellido_materno" type="text" name="apellido_materno" value="{{ old('apellido_materno')  }}" required autofocus> <br><br>

        <label for="ci">C. I.</label>
        <input id="ci" type="text" name="ci" value="{{ old('ci')  }}" required autofocus> <br><br>

        <label for="fecha_nacimiento">fecha_nacimiento</label>
        <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento')  }}" required autofocus> <br><br>

        <label for="celular">Celular</label>
        <input id="celular" type="number" name="celular" value="{{ old('celular')  }}" required autofocus> <br><br>

        <label for="direccion">Direccion</label>
        <input id="direccion" type="text" name="direccion" value="{{ old('direccion')  }}" required autofocus> <br><br>

        <label for="cargo">Cargo</label>
        <select name="cargo" id="cargo">
            <option value="Encargado" {{ old('cargo')=='Encargado' ? 'selected' : ''  }}>Encargado</option>
            <option value="Administrador" {{ old('cargo')=='Administrador' ? 'selected' : ''  }}>Administrador</option> 
        </select> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection