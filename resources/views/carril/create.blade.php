@extends('layouts.basic')

@section('content')
    <form method="POST" action="{{url(route('carril.guardar'))}}">
        
        {{ csrf_field() }}
        
        <label for="carril">Carril</label>
        <input id="carril" type="number" name="carril" value="{{ old('carril')  }}" required autofocus> <br><br>

        <label for="anden">Anden</label>
        <select name="anden" id="anden">
            <option value="A" {{ old('anden')=='A' ? 'selected' : ''  }}>A</option>
            <option value="B" {{ old('anden')=='B' ? 'selected' : ''  }}>B</option> 
            <option value="C" {{ old('anden')=='C' ? 'selected' : ''  }}>C</option>
        </select> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection