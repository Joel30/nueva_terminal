@extends('layouts.basic')

@section('content')

    <form method="POST" action="{{route('transporte.actualizar', $transporte)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="departamento_id">Destino</label>
        <select name="departamento_id" id="departamento_id">
            @foreach($transporte->departamento->all() as $departamento)
                <option value="{{$departamento->id}}" {{ old('departamento_id', $transporte->departamento_id) == $departamento->id ? 'selected' : ''  }}>{{$departamento->nombre}}</option>
            @endforeach
        </select> <br><br>

        <label for="empresa_id">Empresa de Transporte</label>
        <select name="empresa_id" id="empresa_id">
            @foreach($transporte->empresa->all() as $empresa)
                <option value="{{$empresa->id}}" {{ old('empresa_id', $transporte->empresa_id)== $empresa->id ? 'selected' : ''  }}>{{$empresa->nombre}}</option>
            @endforeach
        </select> <br><br>
        
        <label for="carril_id">Carril</label>
        <select name="carril_id" id="carril_id">
            @foreach($transporte->carril->all() as $carril)
                <option value="{{$carril->id}}" {{ old('carril_id', $transporte->carril_id)== $carril->id ? 'selected' : ''  }}>{{$carril->carril}}</option>
            @endforeach
        </select> <br><br>

        <label for="bus_id">Tipo de Bus</label>
        <select name="bus_id" id="bus_id">
            @foreach($transporte->bus->all() as $bus)
                <option value="{{$bus->id}}" {{ old('bus_id', $transporte->bus_id)== $bus->id ? 'selected' : ''  }}>{{$bus->tipo_bus }} ( {{$bus->modelo}} - {{$bus->color}} )</option>
            @endforeach
        </select> <br><br>

        
        <label for="fecha">fecha</label>
        <input id="fecha" type="date" name="fecha" value="{{ $transporte->fecha  }}" required autofocus> <br><br>
        
        <label for="hora">Hora</label>
        <input id="hora" type="time" name="hora" value="{{ $transporte->hora  }}" required autofocus> <br><br>

        <label for="estado">Estado</label>
        <select name="estado" id="estado">
            <option value="a_tiempo" {{ old('estado', $transporte->estado)=='a_tiempo' ? 'selected' : ''  }}>A Tiempo</option>
            <option value="retrasado" {{ old('estado', $transporte->estado)=='retrasado' ? 'selected' : ''  }}>Retrasado</option> 
            <option value="cancelado" {{ old('estado', $transporte->estado)=='cancelado' ? 'selected' : ''  }}>Cancelado</option> 
        </select> <br><br>

        <label for="llegada_salida">Llegada/Salida</label>
        <select name="llegada_salida" id="llegada_salida">
            <option value='salida' {{ old('llegada_salida', $transporte->llegada_salida)== 0 ? 'selected' : ''  }}>Salida</option>
            <option value='llegada' {{ old('llegada_salida', $transporte->llegada_salida)== 1 ? 'selected' : ''  }}>Llegada</option> 
        </select> <br><br>

        


        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection