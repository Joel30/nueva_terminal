@extends('layouts.app')

@section('title') 
    Nuevo Departamento
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('departamento.index')}}">Departamento</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('departamento.index')}}" class="boton btn-blue py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{url(route('departamento.guardar'))}}" onsubmit="prevent_multiple_submits()">
        
        {{ csrf_field() }}
        
        <div class="form-group row">
            <label for="destino" class="col-md-4 col-form-label text-md-right">Destino: </label>

            <div class="col-md-6">
                <input id="destino" type="text" class="form-control{{ $errors->has('destino') ? ' is-invalid' : '' }}" name="destino" value="{{ old('destino')}}" required autofocus>

                @if ($errors->has('destino'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('destino') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="tipo" class="col-md-4 col-form-label text-md-right">Transporte: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" id="tipo" required autofocus>
                    <option> </option>
                    <option value="Nacional" {{ old('tipo')=='Nacional' ? 'selected' : ''  }}>Nacional</option>
                    <option value="Internacional" {{ old('tipo')=='Internacional' ? 'selected' : ''  }}>Internacional</option> 
                </select>
                @if ($errors->has('tipo'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tipo') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button id="register_btn" type="submit" class="boton btn-violet btn-block mt-4">
                    <i class="fa fa-save fa-fw"></i>
                    Guardar
                </button>
            </div>
        </div>
    </form>
@endsection