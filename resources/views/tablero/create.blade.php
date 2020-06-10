@extends('layouts.app')

@section('title') 
    Nuevo Registro 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('viaje.index')}}">Tablero</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
@endsection

@section('box')
    <div class="">
        <a href="{{route('viaje.index')}}" class="boton btn-blue py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{route('viaje.guardar')}}" onsubmit="prevent_multiple_submits()">

        {{ csrf_field() }}

        <div class="form-group row">
            <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Destino:</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('departamento_id') ? ' is-invalid' : '' }}" name="departamento_id" id="departamento_id" onchange="empresa(this.value)" required autofocus>
                    <option> </option>

                    @foreach($destinos as $destino)
                        <option value="{{$destino->id}}" {{ old('departamento_id')== $destino->id ? 'selected' : ''  }}>{{$destino->destino}}</option>
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
                <select class="form-control{{ $errors->has('empresa_id') ? ' is-invalid' : '' }}" name="empresa_id" id="empresa_id" onchange="bus(this.value)" required>
                    <option> </option>
                    @foreach($buses as $bus)
                        @if(old('departamento_id') == $bus->transporte->departamento_id)
                            <option value="{{$bus->empresa_id}}" {{ old('empresa_id')== $bus->empresa_id ? 'selected' : ''  }}>{{$bus->empresa->nombre}}</option>
                        @endif
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
                <select class="form-control{{ $errors->has('bus_id') ? ' is-invalid' : '' }}" name="bus_id" id="bus_id" onchange="hora_transporte(this.value)" required>
                    <option> </option>
                    @foreach($buses as $bus)
                        @if(old('empresa_id') == $bus->empresa_id && $bus->transporte->departamento_id == old('departamento_id'))
                            <option value="{{$bus->id}}" {{ old('bus_id')== $bus->id ? 'selected' : ''  }}>{{$bus->tipo_bus }} ( P: {{$bus->placa}} - M: {{$bus->modelo}} )</option>
                        @endif
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
                <input id="fecha" type="date" min="{{ $today }}" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ $today }}" required autofocus onchange="cambiar_select()">
                @if ($errors->has('fecha'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('fecha') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="llegada_salida" class="col-md-4 col-form-label text-md-right">Llegada / Salida: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('llegada_salida') ? ' is-invalid' : '' }}" name="llegada_salida" id="llegada_salida" onchange="hora_transporte(this.value)" required>
                    <option> </option>
                    <option value='salida' {{ old('llegada_salida')=='salida' ? 'selected' : ''  }}>Salida</option>
                    <option value='llegada' {{ old('llegada_salida')=='llegada' ? 'selected' : ''  }}>Llegada</option> 
                </select>
                @if ($errors->has('llegada_salida'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('llegada_salida') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="hora" class="col-md-4 col-form-label text-md-right">Hora: </label>
            <div class="col-md-6">
                <input id="hora" type="time" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" name="hora" value="{{ old('hora')}}" required autofocus>
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
                    <option> </option>
                    <option value="a_tiempo" {{ old('estado')=='a_tiempo' ? 'selected' : ''  }}>A Tiempo</option>
                    <option value="retrasado" {{ old('estado')=='retrasado' ? 'selected' : ''  }}>Retrasado</option> 
                    <option value="cancelado" {{ old('estado')=='cancelado' ? 'selected' : ''  }}>Cancelado</option>
                    <option value="llegado" {{ old('estado')=='llegado' ? 'selected' : ''  }}>Llegado</option> 

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
                <button id="register_btn" type="submit" class="boton btn-violet btn-block mt-4">
                    <i class="fa fa-save fa-fw"></i>
                    Guardar
                </button>
            </div>
        </div>
    </form>

    <script>
        function cambiar_select(){
            document.getElementById("departamento_id").options.item(0).selected = 'selected';
            empresa(-1);
        }

        function fecha(){
            let fecha = document.getElementById("fecha").value;
            if(fecha.length == 0){
                fecha = "{{Carbon\Carbon::now()->format('Y-m-d')}}";
            } 
            return fecha;
        }
        function hora_transporte(val){  
            var input_hora = document.getElementById("hora");

            if (val == "salida") {
                var bus_id = document.getElementById("bus_id").value; 
                @foreach($buses as $bus)
                    if({{$bus->id}} == bus_id){
                        input_hora.value = "{{$bus->transporte->hora}}";
                    }
                @endforeach  
            } else if (val == "llegada"){
                input_hora.value = "";
            } else {
                @foreach($buses as $bus)
                    if({{$bus->id}} == val){
                        input_hora.value = "{{$bus->transporte->hora}}";
                    }
                @endforeach  
            }
        }

        function empresa(val){  
            console.log(val);
            
            var html = "<option></option>";
            var no_duplicados = [];
            @foreach($buses as $bus)
                if({{$bus->transporte->departamento_id}} == val){
                    var is_now = false;
                    @foreach(App\Transporte::find($bus->transporte->id)->viajes as $fecha)
                    console.log("{{$bus->transporte->id}} : " + " {{$fecha->fecha}}");

                        if ("{{$fecha->fecha}}" == fecha()) is_now = true;
                    @endforeach
                    console.log("{{$bus->transporte->id}} : " + is_now);

                    if(is_now == false){
                        
                        if (!no_duplicados.includes("{{$bus->empresa->nombre}}")){
                            html = html + `<option value="{{$bus->empresa_id}}" {{ old('empresa_id')=='$bus->empresa_id' ? 'selected' : ''  }}>{{$bus->empresa->nombre}}</option>`;
                            no_duplicados.push("{{$bus->empresa->nombre}}");
                        }
                    }
                }
            @endforeach 
            if (html == "<option></option>" && val != -1 && val != "") html="<option> [ No disponibles para hoy ]</option>";  
            document.getElementById("empresa_id").innerHTML = html;
            if(val == -1) bus(-1);            
        }

        function bus(val){       
            var cod = document.getElementById("departamento_id").value; 
            var html ="<option></option>";
            @foreach($buses as $bus)
                if({{$bus->empresa->id}} == val && {{$bus->transporte->departamento_id}} == cod){
                    var is_now = false;
                    @foreach(App\Transporte::find($bus->transporte->id)->viajes as $fecha)
                        if ("{{$fecha->fecha}}" == fecha()) is_now = true;
                    @endforeach
                    if(is_now == false){
                        html = html + `<option value="{{$bus->id}}" {{ old('bus_id')=='$bus->id' ? 'selected' : ''  }}>{{$bus->tipo_bus }} ( P: {{$bus->placa}} - M: {{$bus->modelo}} )</option>`;
                    }
                }
            @endforeach    
            document.getElementById("bus_id").innerHTML = html;     
        }

        
    </script>
@endsection