@extends('layouts.app')

@section('title') 
    <a href="{{route('departamento.index')}}" class="btn btn-danger py-1 ">
        <i class="fa fa-chevron-left fa-fw" aria-hidden="true"></i>
        Regresar
    </a> 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('departamento.index')}}">Departamento</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
@endsection

@section('content')
    <form method="POST" action="{{url(route('departamento.guardar'))}}">
        
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

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button type="submit" class="btn btn-primary1 btn-block mt-4">
                    Guardar
                </button>
            </div>
        </div>
    </form>
@endsection