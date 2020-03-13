@extends('layouts.app')

@section('title') <a href="{{route('transporte.index')}}" class="btn btn-danger">LISTA DE TRANSPORTE</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('transporte.index')}}">&nbsp;/ Transporte</a></li>
    <li class="active">&nbsp;/ Editar</li>
@endsection

@section('content')

    <form method="POST" action="{{route('transporte.actualizar', $transporte)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Destino: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('departamento_id') ? ' is-invalid' : '' }}" name="departamento_id" id="departamento_id" required>
                    @foreach($transporte->departamento->all() as $departamento)
                        <option value="{{$departamento->id}}" {{ old('departamento_id', $transporte->departamento_id) == $departamento->id ? 'selected' : ''  }}>{{$departamento->nombre}}</option>
                    @endforeach
                </select>
                @if ($errors->has('departamento_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('departamento_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="empresa_id" class="col-md-4 col-form-label text-md-right">Empresa de Transporte: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('empresa_id') ? ' is-invalid' : '' }}" name="empresa_id" id="empresa_id" required>
                    @foreach($transporte->empresa->all() as $empresa)
                        <option value="{{$empresa->id}}" {{ old('empresa_id', $transporte->empresa_id)== $empresa->id ? 'selected' : ''  }}>{{$empresa->nombre}}</option>
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
            <label for="carril_id" class="col-md-4 col-form-label text-md-right">Carril: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('carril_id') ? ' is-invalid' : '' }}" name="carril_id" id="carril_id" required>
                    @foreach($transporte->carril->all() as $carril)
                        <option value="{{$carril->id}}" {{ old('carril_id', $transporte->carril_id)== $carril->id ? 'selected' : ''  }}>{{$carril->carril}}</option>
                    @endforeach
                </select>
                @if ($errors->has('carril_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('carril_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="bus_id" class="col-md-4 col-form-label text-md-right">Tipo de Bus: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('bus_id') ? ' is-invalid' : '' }}" name="bus_id" id="bus_id" required>
                    @foreach($transporte->bus->all() as $bus)
                        <option value="{{$bus->id}}" {{ old('bus_id', $transporte->bus_id)== $bus->id ? 'selected' : ''  }}>{{$bus->tipo_bus }} ( {{$bus->modelo}} - {{$bus->color}} )</option>
                    @endforeach
                </select>
                @if ($errors->has('bus_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('bus_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha: </label>
            <div class="col-md-6">
                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{$transporte->fecha}}" required autofocus>
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
                <input id="hora" type="time" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" name="hora" value="{{$transporte->hora}}" required autofocus>
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
                    <option value="a_tiempo" {{ old('estado', $transporte->estado)=='a_tiempo' ? 'selected' : ''  }}>A Tiempo</option>
                    <option value="retrasado" {{ old('estado', $transporte->estado)=='retrasado' ? 'selected' : ''  }}>Retrasado</option> 
                    <option value="cancelado" {{ old('estado', $transporte->estado)=='cancelado' ? 'selected' : ''  }}>Cancelado</option> 
                    <option value="llegado" {{ old('estado', $transporte->estado)=='llegado' ? 'selected' : ''  }}>Llegado</option> 

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
                    <option value='salida' {{ old('llegada_salida', $transporte->llegada_salida)== 0 ? 'selected' : ''  }}>Salida</option>
                    <option value='llegada' {{ old('llegada_salida', $transporte->llegada_salida)== 1 ? 'selected' : ''  }}>Llegada</option> 
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