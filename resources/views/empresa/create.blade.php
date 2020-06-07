@extends('layouts.app')

@section('title') 
    Nueva Empresa
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('empresa.index')}}">Empresa</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('empresa.index')}}" class="btn btn-info py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{route('empresa.guardar')}}" onsubmit="prevent_multiple_submits()">
        
        {{ csrf_field() }}
        
        <div class="form-group row">
            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre: </label>

            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre')}}" required autofocus>

                @if ($errors->has('nombre'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="nro_oficina" class="col-md-4 col-form-label text-md-right">Numero de Oficina: </label>

            <div class="col-md-6">
                <input id="nro_oficina" type="number" class="form-control{{ $errors->has('nro_oficina') ? ' is-invalid' : '' }}" name="nro_oficina" value="{{ old('nro_oficina')}}" required autofocus>

                @if ($errors->has('nro_oficina'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nro_oficina') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono: </label>

            <div class="col-md-6">
                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono')}}" autofocus>

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
                <input id="celular" type="number" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular')}}" required autofocus>

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
                <input id="responsable" type="text" class="form-control{{ $errors->has('responsable') ? ' is-invalid' : '' }}" name="responsable" value="{{ old('responsable')}}" required autofocus>

                @if ($errors->has('responsable'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('responsable') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button id="register_btn" type="submit" class="btn btn-primary1 btn-block mt-4">
                    <i class="fa fa-save fa-fw"></i>
                    Guardar
                </button>
            </div>
        </div>
    </form>
@endsection