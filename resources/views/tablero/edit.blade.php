@extends('layouts.app')

@section('title') 
    <a href="{{route('viaje.index')}}" class="btn btn-danger py-1 ">
        <i class="fa fa-chevron-left fa-fw" aria-hidden="true"></i>
        Regresar
    </a> 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('viaje.index')}}">viaje</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')

    <form method="POST" action="{{route('viaje.actualizar', $viaje)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="transporte_id" class="col-md-4 col-form-label text-md-right">Destino: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('transporte_id') ? ' is-invalid' : '' }}" name="transporte_id" id="transporte_id" required>
                    @foreach($viaje->transporte->all() as $transporte)
                        <option value="{{$transporte->id}}" {{ old('transporte_id', $viaje->transporte_id) == $transporte->id ? 'selected' : ''  }}>{{$transporte->departamento->destino}}</option>
                    @endforeach
                </select>
                @if ($errors->has('transporte_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('transporte_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha: </label>
            <div class="col-md-6">
                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{$viaje->fecha}}" required autofocus>
                @if ($errors->has('fecha'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('fecha') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="hora" class="col-md-4 col-form-label text-md-right">Hora: </label>
            <div class="col-md-6">
                <input id="hora" type="time" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" name="hora" value="{{$viaje->hora}}" required autofocus>
                @if ($errors->has('hora'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('hora') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="estado" class="col-md-4 col-form-label text-md-right">Estado: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" id="estado" required>
                    <option value="a_tiempo" {{ old('estado', $viaje->estado)=='a_tiempo' ? 'selected' : ''  }}>A Tiempo</option>
                    <option value="retrasado" {{ old('estado', $viaje->estado)=='retrasado' ? 'selected' : ''  }}>Retrasado</option> 
                    <option value="cancelado" {{ old('estado', $viaje->estado)=='cancelado' ? 'selected' : ''  }}>Cancelado</option> 
                    <option value="llegado" {{ old('estado', $viaje->estado)=='llegado' ? 'selected' : ''  }}>Llegado</option> 

                </select>
                @if ($errors->has('estado'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('estado') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="llegada_salida" class="col-md-4 col-form-label text-md-right">Llegada / Salida:</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('llegada_salida') ? ' is-invalid' : '' }}" name="llegada_salida" id="llegada_salida" required>
                    <option value='salida' {{ old('llegada_salida', $viaje->llegada_salida)== 0 ? 'selected' : ''  }}>Salida</option>
                    <option value='llegada' {{ old('llegada_salida', $viaje->llegada_salida)== 1 ? 'selected' : ''  }}>Llegada</option> 
                </select>
                @if ($errors->has('llegada_salida'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('llegada_salida') }}</strong>
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