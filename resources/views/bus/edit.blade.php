@extends('layouts.basic')

@section('content')
    <form method="POST" action="{{url(route('bus.actualizar', $bus))}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="tipo_bus">Tipo de Bus</label>
        <!--input id="tipo_bus" type="text" name="tipo_bus" value="{{$bus->tipo_bus}}" required autofocus> <br><br-->
        <select name="tipo_bus" id="tipo_bus">
            <option value="Normal" {{ old('tipo_bus', $bus->tipo_bus)=='Normal' ? 'selected' : ''  }}>Normal</option>
            <option value="Semicama" {{ old('tipo_bus', $bus->tipo_bus)=='Semicama' ? 'selected' : ''  }}>Semicama</option> 
            <option value="Cama" {{ old('tipo_bus', $bus->tipo_bus)=='Cama' ? 'selected' : ''  }}>Cama</option>
            <option value="Leito" {{ old('tipo_bus', $bus->tipo_bus)=='Leito' ? 'selected' : ''  }}>Leito</option>
        </select> <br><br>

        <label for="placa">Placa</label>
        <input id="placa" type="text" name="placa" value="{{$bus->placa}}" required autofocus> <br><br>

        <label for="modelo">Modeo</label>
        <input id="modelo" type="text" name="modelo" value="{{$bus->modelo}}" required autofocus> <br><br>

        <label for="color">Color</label>
        <input id="color" type="text" name="color" value="{{$bus->color}}" required autofocus> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection