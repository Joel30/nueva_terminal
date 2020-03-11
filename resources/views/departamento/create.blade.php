@extends('layouts.app')

@section('title') <a href="{{route('departamento.index')}}" class="btn btn-danger">DEPARTAMENTO</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('departamento.index')}}">Departamento</a></li>
    <li class="active">Nuevo</li>
@endsection

@section('content')
    <form method="POST" action="{{url(route('departamento.guardar'))}}">
        
        {{ csrf_field() }}
        
        <label for="nombre">nombre</label>
        <input id="nombre" type="text" name="nombre" value="{{ old('nombre')  }}" required autofocus> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection