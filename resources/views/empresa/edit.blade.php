@extends('layouts.app')

@section('title') 
    Editar empresa
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('empresa.index')}}">Empresa</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('empresa.index')}}" class="boton btn-blue py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{route('empresa.actualizar', $empresa)}}" onsubmit="prevent_multiple_submits()">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre: </label>

            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{old('nombre', $empresa->nombre)}}" required autofocus>

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
                <input id="nro_oficina" type="number" class="form-control{{ $errors->has('nro_oficina') ? ' is-invalid' : '' }}" name="nro_oficina" value="{{old('nro_oficina', $empresa->nro_oficina)}}" required autofocus>

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
                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{old('telefono', $empresa->telefono)}}" autofocus>

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
                <input id="celular" type="number" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{old('celular', $empresa->celular)}}" required autofocus>

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
                <input id="responsable" type="text" class="form-control{{ $errors->has('responsable') ? ' is-invalid' : '' }}" name="responsable" value="{{old('responsable', $empresa->responsable)}}" required autofocus>

                @if ($errors->has('responsable'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('responsable') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button id="register_btn" type="submit" class="boton btn-yellow btn-block mt-4">
                    <i class="fa fa-edit fa-fw"></i>
                    Actualizar
                </button>
            </div>
        </div>
    </form>
@endsection