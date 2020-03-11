@extends('layouts.app')

@section('title') <a href="{{route('carril.index')}}" class="btn btn-danger">CARRIL</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('carril.index')}}">Carril</a></li>
    <li class="active">Editar</li>
@endsection

@section('content')
    <form method="POST" action="{{url(route('carril.actualizar', $carril))}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="carril">carril</label>
        <input id="carril" type="text" name="carril" value="{{$carril->carril}}" required autofocus> <br><br>

        <label for="anden">Anden</label>
        <select name="anden" id="anden">
            <option value="A" {{ old('anden', $carril->anden)=='A' ? 'selected' : ''  }}>A</option>
            <option value="B" {{ old('anden', $carril->anden)=='B' ? 'selected' : ''  }}>B</option> 
            <option value="C" {{ old('anden', $carril->anden)=='C' ? 'selected' : ''  }}>C</option>
        </select> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection