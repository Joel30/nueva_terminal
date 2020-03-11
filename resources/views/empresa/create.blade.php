@extends('layouts.app')

@section('title') <a href="{{route('empresa.index')}}" class="btn btn-danger">EMPRESA DE TRANSPORTE</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('empresa.index')}}">Empresa</a></li>
    <li class="active">Nuevo</li>
@endsection

@section('content')
    <form method="POST" action="{{route('empresa.guardar')}}">
        
        {{ csrf_field() }}
        
        <label for="nombre">nombre</label>
        <input id="nombre" type="text" name="nombre" value="{{ old('nombre')  }}" required autofocus> <br><br>

        <label for="nro_oficina">Nro de Oficina</label>
        <input id="nro_oficina" type="number" name="nro_oficina" value="{{ old('nro_oficina')  }}" required autofocus> <br><br>
        
        <label for="telefono">Telefono</label>
        <input id="telefono" type="text" name="telefono" value="{{ old('telefono')  }}" required autofocus> <br><br>
        
        <label for="celular">Celular</label>
        <input id="celular" type="number" name="celular" value="{{ old('celular')  }}" required autofocus> <br><br>
        
        <label for="responsable">responsable</label>
        <input id="responsable" type="text" name="responsable" value="{{ old('responsable')  }}" required autofocus> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection