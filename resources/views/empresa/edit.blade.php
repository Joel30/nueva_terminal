@extends('layouts.app')

@extends('layouts.app')

@section('title') <a href="{{route('empresa.index')}}" class="btn btn-danger">EMPRESA DE TRANSPORTE</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('empresa.index')}}">&nbsp;/ Empresa</a></li>
    <li class="active">&nbsp;/ Editar</li>
@endsection

@section('content')
    <form method="POST" action="{{route('empresa.actualizar', $empresa)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre: </label>

            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$empresa->nombre}}" required autofocus>

                @if ($errors->has('nombre'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="nro_oficina" class="col-md-4 col-form-label text-md-right">Número de Oficina: </label>

            <div class="col-md-6">
                <input id="nro_oficina" type="number" class="form-control{{ $errors->has('nro_oficina') ? ' is-invalid' : '' }}" name="nro_oficina" value="{{$empresa->nro_oficina}}" required autofocus>

                @if ($errors->has('nro_oficina'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nro_oficina') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono: </label>

            <div class="col-md-6">
                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{$empresa->telefono}}" required autofocus>

                @if ($errors->has('telefono'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('telefono') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="celular" class="col-md-4 col-form-label text-md-right">Celular: </label>

            <div class="col-md-6">
                <input id="celular" type="number" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{$empresa->celular}}" required autofocus>

                @if ($errors->has('celular'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('celular') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="responsable" class="col-md-4 col-form-label text-md-right">Responsable: </label>

            <div class="col-md-6">
                <input id="responsable" type="text" class="form-control{{ $errors->has('responsable') ? ' is-invalid' : '' }}" name="responsable" value="{{$empresa->responsable}}" required autofocus>

                @if ($errors->has('responsable'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('responsable') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button type="submit" class="btn btn-warning btn-block mt-4">
                    Actualizar
                </button>
            </div>
        </div>
    </form>
@endsection