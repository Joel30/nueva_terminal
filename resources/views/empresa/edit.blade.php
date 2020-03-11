@extends('layouts.app')

@extends('layouts.app')

@section('title') <a href="{{route('empresa.index')}}" class="btn btn-danger">EMPRESA DE TRANSPORTE</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('empresa.index')}}">Empresa</a></li>
    <li class="active">Editar</li>
@endsection

@section('content')
    <form method="POST" action="{{route('empresa.actualizar', $empresa)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" value="{{$empresa->nombre}}" required autofocus> <br><br>

        <label for="nro_oficina">Numero de Oficina</label>
        <input id="nro_oficina" type="number" name="nro_oficina" value="{{$empresa->nro_oficina}}" required autofocus> <br><br>

        <label for="telefono">Telefono</label>
        <input id="telefono" type="text" name="telefono" value="{{$empresa->telefono}}" required autofocus> <br><br>

        <label for="celular">Celular</label>
        <input id="celular" type="number" name="celular" value="{{$empresa->celular}}" required autofocus> <br><br>

        <label for="responsable">Responsable</label>
        <input id="responsable" type="text" name="responsable" value="{{$empresa->responsable}}" required autofocus> <br><br>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection