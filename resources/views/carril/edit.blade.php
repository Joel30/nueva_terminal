@extends('layouts.app')

@section('title') 
    Editar Carril
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('carril.index')}}">Carril</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('carril.index')}}" class="boton btn-blue py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{url(route('carril.actualizar', $carril))}}" onsubmit="prevent_multiple_submits()">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="carril" class="col-md-4 col-form-label text-md-right">Numero de Carril: </label>

            <div class="col-md-6">
                <input id="carril" type="number" class="form-control{{ $errors->has('carril') ? ' is-invalid' : '' }}" name="carril" value="{{old('carril', $carril->carril)}}" required autofocus>

                @if ($errors->has('carril'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('carril') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="anden" class="col-md-4 col-form-label text-md-right">Anden: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('anden') ? ' is-invalid' : '' }}" name="anden" id="anden" required autofocus>
                    <option value="A" {{ old('anden', $carril->anden)=='A' ? 'selected' : ''  }}>A</option>
                    <option value="B" {{ old('anden', $carril->anden)=='B' ? 'selected' : ''  }}>B</option> 
                    <option value="C" {{ old('anden', $carril->anden)=='C' ? 'selected' : ''  }}>C</option>
                </select>
                @if ($errors->has('anden'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('anden') }}</strong>
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