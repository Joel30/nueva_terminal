@extends('layouts.basic')

@section('content')
    <form method="POST" action="{{url(route('bus.guardar'))}}">
        
        {{ csrf_field() }}
        
        <label for="tipo_bus">Tipo de Bus</label>
        <!--input id="tipo_bus" type="text" name="tipo_bus" value="{{ old('tipo_bus')  }}" required autofocus> <br><br-->
        <select name="tipo_bus" id="tipo_bus">
            <option value="Normal" {{ old('tipo_bus')=='Normal' ? 'selected' : ''  }}>Norma</option>
            <option value="Semicama" {{ old('tipo_bus')=='Semicama' ? 'selected' : ''  }}>Semicama</option> 
            <option value="Cama" {{ old('tipo_bus')=='Cama' ? 'selected' : ''  }}>Cama</option>
            <option value="Leito" {{ old('tipo_bus')=='Leito' ? 'selected' : ''  }}>Leito</option>
        </select>

        <label for="placa">Placa</label>
        <input id="placa" type="text" name="placa" value="{{ old('placa')  }}" required autofocus> <br><br>

        <label for="modelo">Modeo</label>
        <input id="modelo" type="text" name="modelo" value="{{ old('modelo')  }}" required autofocus> <br><br>

        <label for="color">Color</label>
        <input id="color" type="text" name="color" value="{{ old('color')  }}" required autofocus> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection