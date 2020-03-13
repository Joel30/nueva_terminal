@extends('layouts.app')

@section('title') <a href="{{route('carril.index')}}" class="btn btn-danger">CARRIL</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('carril.index')}}">&nbsp;/ Carril</a></li>
    <li class="active">&nbsp;/ Editar</li>
@endsection

@section('content')
    <form method="POST" action="{{url(route('carril.actualizar', $carril))}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="carril" class="col-md-4 col-form-label text-md-right">Numero Carril: </label>

            <div class="col-md-6">
                <input id="carril" type="number" class="form-control{{ $errors->has('carril') ? ' is-invalid' : '' }}" name="carril" value="{{$carril->carril}}" required autofocus>

                @if ($errors->has('carril'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('carril') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="anden" class="col-md-4 col-form-label text-md-right">Tipo de Bus: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('anden') ? ' is-invalid' : '' }}" name="anden" id="anden" required>
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
                <button type="submit" class="btn btn-warning btn-block mt-4">
                    Actualizar
                </button>
            </div>
        </div>
    </form>
@endsection