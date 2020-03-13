@extends('layouts.app')

@section('title') <a href="{{route('bus.index')}}" class="btn btn-danger">BUSES</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('bus.index')}}">&nbsp;/ Buses</a></li>
    <li class="active">&nbsp;/ Editar</li>
@endsection

@section('content')
    <form method="POST" action="{{route('bus.actualizar', $bus)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="tipo_bus" class="col-md-4 col-form-label text-md-right">Tipo de Bus: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('tipo_bus') ? ' is-invalid' : '' }}" name="tipo_bus" id="tipo_bus" required>
                    <option value="Normal" {{ old('tipo_bus', $bus->tipo_bus)=='Normal' ? 'selected' : ''  }}>Normal</option>
                    <option value="Semicama" {{ old('tipo_bus', $bus->tipo_bus)=='Semicama' ? 'selected' : ''  }}>Semicama</option> 
                    <option value="Cama" {{ old('tipo_bus', $bus->tipo_bus)=='Cama' ? 'selected' : ''  }}>Cama</option>
                    <option value="Leito" {{ old('tipo_bus', $bus->tipo_bus)=='Leito' ? 'selected' : ''  }}>Leito</option>
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
                <input id="placa" type="text" class="form-control{{ $errors->has('placa') ? ' is-invalid' : '' }}" name="placa" value="{{$bus->placa}}" required autofocus>

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
                <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{$bus->modelo}}" required autofocus>

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
                <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{$bus->color}}" required autofocus>

                @if ($errors->has('color'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('color') }}</strong>
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