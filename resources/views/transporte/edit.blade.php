@extends('layouts.app')

@section('title') 
    <a href="{{route('transporte.index')}}" class="btn btn-danger py-1 ">
        <i class="fa fa-chevron-left fa-fw" aria-hidden="true"></i>
        Regresar
    </a> 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('transporte.index')}}">Transporte</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')

    <form method="POST" action="{{route('transporte.actualizar', $transporte)}}" onsubmit="prevent_multiple_submits()">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Destino: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('departamento_id') ? ' is-invalid' : '' }}" name="departamento_id" id="departamento_id" required>
                    @foreach($transporte->departamento->orderBy('destino')->get() as $departamento)
                        <option value="{{$departamento->id}}" {{ old('departamento_id', $transporte->departamento_id) == $departamento->id ? 'selected' : ''  }}>{{$departamento->destino}}</option>
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
                <select class="form-control{{ $errors->has('empresa_id') ? ' is-invalid' : '' }}" name="empresa_id" id="empresa_id"  onchange="empresa(this.value)" required>

                    @if($find_empresa == 0)
                        <option value="{{$transporte->bus->empresa->id}}" {{ old('empresa_id', $transporte->bus->empresa_id)== $transporte->bus->empresa_id ? 'selected' : ''  }}>{{$transporte->bus->empresa->nombre}}</option>
                    @endif

                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}" {{ old('empresa_id', $transporte->bus->empresa_id)== $empresa->id ? 'selected' : ''  }}>{{$empresa->nombre}}</option>
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
            <label for="bus_id" class="col-md-4 col-form-label text-md-right">Tipo de Bus: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('bus_id') ? ' is-invalid' : '' }}" name="bus_id" id="bus_id" required>
                    @foreach($buses as $bus)
                        @if(old('empresa_id', $transporte->bus->empresa_id) == $bus->empresa_id)
                            <option value="{{$bus->id}}" {{ old('bus_id', $transporte->bus_id)== $bus->id ? 'selected' : ''  }}>{{$bus->tipo_bus }} ( {{$bus->modelo}} - {{$bus->color}} - {{$bus->empresa_id}} )</option>
                        @endif
                    @endforeach

                    @if(old('empresa_id', $transporte->bus->empresa_id) == $transporte->bus->empresa_id)
                        <option value="{{$transporte->bus->id}}" {{ old('bus_id', $transporte->bus_id)== $transporte->bus->id ? 'selected' : ''  }}>{{$transporte->bus->tipo_bus.' ('.$transporte->bus->modelo.' - '.$transporte->bus->color.' - '.$transporte->bus->empresa_id.')'}}</option>
                    @endif

                </select>
                @if ($errors->has('bus_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('bus_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="carril_id" class="col-md-4 col-form-label text-md-right">Carril: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('carril_id') ? ' is-invalid' : '' }}" name="carril_id" id="carril_id" required>
                    @foreach($transporte->carril->orderBy('carril')->get() as $carril)
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
                    <option value="activo" {{ old('estado', $transporte->estado)=='activo' ? 'selected' : ''  }}>Activo</option>
                    <option value="cancelado" {{ old('estado', $transporte->estado)=='cancelado' ? 'selected' : ''  }}>Cancelado</option> 

                </select>
                @if ($errors->has('estado'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('estado') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button id="register_btn" type="submit" class="btn btn-warning btn-block mt-4">
                    Actualizar
                </button>
            </div>
        </div>
    </form>

    <script>
        function empresa(val){         
            var html ="<option></option>";
            
            @foreach($buses as $bus)
                if({{$bus->empresa->id}} == val){
                    html = html + `<option value="{{$bus->id}}" {{ old('bus_id')=='$bus->id' ? 'selected' : ''  }}>{{$bus->tipo_bus }} ( {{$bus->modelo}} - {{$bus->color}} - {{$bus->empresa->id}})</option>`;
                }
            @endforeach
            
            if(val == {{$transporte->bus->empresa_id}}){
                html = html + `<option value="{{$transporte->bus->id}}" {{ old('bus_id')=='$transporte->bus->id' ? 'selected' : ''  }}>{{$transporte->bus->tipo_bus }} ( {{$transporte->bus->modelo}} - {{$transporte->bus->color}} - {{$transporte->bus->empresa->id}})</option>`;
            }   
               
            document.getElementById("bus_id").innerHTML = html;  
        }
    </script>
@endsection