@extends('layouts.app')

@section('title') 
    <a href="{{route('bus.index')}}" class="btn btn-danger py-1 ">
        <i class="fa fa-chevron-left fa-fw" aria-hidden="true"></i>
        Regresar
    </a> 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('bus.index')}}">Buses</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
@endsection

@section('content')

    <form method="POST" action="{{route('bus.guardar')}}" onsubmit="prevent_multiple_submits()">
        
        {{ csrf_field() }}
        
        <div class="form-group row">
            <label for="empresa_id" class="col-md-4 col-form-label text-md-right">Empresa de Transporte: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('empresa_id') ? ' is-invalid' : '' }}" name="empresa_id" id="empresa_id" required>
                    <option> </option>
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}" {{ old('empresa_id')== $empresa->id ? 'selected' : ''  }}>{{$empresa->nombre}}</option>
                    @endforeach
                </select>
                @if ($errors->has('empresa_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('empresa_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="tipo_bus" class="col-md-4 col-form-label text-md-right">Tipo de Bus: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('tipo_bus') ? ' is-invalid' : '' }}" name="tipo_bus" id="tipo_bus" required>
                    <option> </option>
                    <option value="Normal" {{ old('tipo_bus')=='Normal' ? 'selected' : ''  }}>Normal</option>
                    <option value="Semicama" {{ old('tipo_bus')=='Semicama' ? 'selected' : ''  }}>Semicama</option> 
                    <option value="Cama" {{ old('tipo_bus')=='Cama' ? 'selected' : ''  }}>Cama</option>
                    <option value="Leito" {{ old('tipo_bus')=='Leito' ? 'selected' : ''  }}>Leito</option>
                </select>
                @if ($errors->has('tipo_bus'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tipo_bus') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="placa" class="col-md-4 col-form-label text-md-right">Placa: </label>

            <div class="col-md-6">
                <input id="placa" type="text" class="form-control{{ $errors->has('placa') ? ' is-invalid' : '' }}" name="placa" value="{{ old('placa')}}" required autofocus>

                @if ($errors->has('placa'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('placa') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="modelo" class="col-md-4 col-form-label text-md-right">Modelo: </label>

            <div class="col-md-6">
                <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{ old('modelo')}}" required autofocus>

                @if ($errors->has('modelo'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('modelo') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="color" class="col-md-4 col-form-label text-md-right">Color: </label>

            <div class="col-md-6">
                <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ old('color')}}" required autofocus>

                @if ($errors->has('color'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('color') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button id="register_btn" type="submit" class="btn btn-primary1 btn-block mt-4" >
                    Guardar
                </button>
            </div>
        </div>
    </form>
@endsection