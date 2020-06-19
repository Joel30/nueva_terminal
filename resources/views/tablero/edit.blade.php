@extends('layouts.app')

@section('title')
    {{$viaje->copia == true ? 'Copiar Registro' : 'Editar registro'}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('viaje.index')}}">viaje</a></li>
    <li class="breadcrumb-item active">{{$viaje->copia == true ? 'Copia' : 'Editar'}}</li>
@endsection

@section('box')
    <div class="">
        <a href="javascript:history.back(-1);"  class="boton btn-blue py-1 mb-3">
            <i class="fa fa-chevron-left fa-fw"></i>
            Regresar
        </a>
    </div>
@endsection

@section('content')

    <form method="POST" action="{{$viaje->copia == true ? route('viaje.copia') : route('viaje.actualizar', $viaje)}}" onsubmit="prevent_multiple_submits()">
        
        @if ($viaje->copia != true) 
            {{ method_field('PUT') }}
        @endif
        {{ csrf_field() }}

        <input type="hidden" name="previous_url" value="{{url()->previous()}}">

        <div class="form-group row">
            <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Destino: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('departamento_id') ? ' is-invalid' : '' }}" name="departamento_id" id="departamento_id" onchange="empresa(this.value)" required autofocus>
                    <option></option>
                    @foreach($destinos as $destino)
                        <option value="{{$destino->id}}" {{ old('departamento_id', $viaje->transporte->departamento_id) == $destino->id ? 'selected' : ''  }}>{{$destino->destino}}</option>
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
                        @if(old('departamento_id', $viaje->transporte->departamento_id) == $bus->transporte->departamento_id)
                            <option value="{{$bus->empresa_id}}" {{ old('empresa_id', $viaje->transporte->bus->empresa_id)== $bus->empresa_id ? 'selected' : ''  }}>{{$bus->empresa->nombre}}</option>
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
                        @if(old('empresa_id', $viaje->transporte->bus->empresa_id) == $bus->empresa_id && $bus->transporte->departamento_id == old('departamento_id',  $viaje->transporte->departamento_id))
                            <option value="{{$bus->id}}" {{ old('bus_id', $viaje->transporte->bus_id)== $bus->id ? 'selected' : ''  }}>{{$bus->tipo_bus }} ( P: {{$bus->placa}} - M: {{$bus->modelo}} )</option>
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
                <input id="fecha" type="date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{$viaje->fecha >= Carbon\Carbon::now()->format('Y-m-d') ? $viaje->fecha : Carbon\Carbon::now()->format('Y-m-d')}}" required autofocus onchange="cambiar_select()">
                @if ($errors->has('fecha'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('fecha') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="llegada_salida" class="col-md-4 col-form-label text-md-right">Llegada / Salida:</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('llegada_salida') ? ' is-invalid' : '' }}" name="llegada_salida" id="llegada_salida" onchange="hora_transporte(this.value)" required>
                    <option value='salida' {{ old('llegada_salida', $viaje->llegada_salida)== 'salida' ? 'selected' : ''  }}>Salida</option>
                    <option value='llegada' {{ old('llegada_salida', $viaje->llegada_salida)== 'llegada' ? 'selected' : ''  }}>Llegada</option> 
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
                <input id="hora" type="time" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" name="hora" value="{{old('hora',$viaje->hora)}}" required autofocus>
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

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
            @if ($viaje->copia != true) 
                <button id="register_btn" type="submit" class="boton btn-yellow btn-block mt-4">
                    <i class="fa fa-edit fa-fw"></i>
                    Actualizar
                </button>
            @else
                <button id="register_btn" type="submit" class="boton btn-green-let btn-block mt-4">
                    <i class="fa fa-copy fa-fw"></i>
                    Copiar
                </button>
            @endif
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        window.addEventListener("load", function(event) {
            empresa("{{$viaje->transporte->departamento_id}}", "selected");
            bus("{{$viaje->transporte->bus->empresa_id}}", "selected")
        });
   
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
                if (bus_id == {{$viaje->transporte->bus_id}}) {
                    input_hora.value = "{{$viaje->hora}}";
                } else {
                    @foreach($buses as $bus)
                        if({{$bus->id}} == bus_id){
                            input_hora.value = "{{$bus->transporte->hora}}";
                        }
                    @endforeach  
                }
            } else if (val == "llegada"){
                input_hora.value = "";
            } else {
                if (val == {{$viaje->transporte->bus_id}}) {
                    input_hora.value = "{{$viaje->hora}}";
                } else {
                    @foreach($buses as $bus)
                        if({{$bus->id}} == val){
                            input_hora.value = "{{$bus->transporte->hora}}";
                        }
                    @endforeach
                }  
            }
        }
        
        function empresa(val, seleccionar =""){             
            var html ="<option></option>";
            var nombre_empresa = [];
            @foreach($buses as $bus)
                if({{$bus->transporte->departamento_id}} == val){
                    var is_now = false;
                    @foreach(App\Transporte::find($bus->transporte->id)->viajes as $fecha)
                        if ("{{$fecha->fecha}}" == fecha()) is_now = true;
                    @endforeach
                    if(is_now == false || {{$viaje->transporte_id}} == {{$bus->transporte->id}}){
                        if (!nombre_empresa.includes("{{$bus->empresa->nombre}}")){
                            html = html + `<option value="{{$bus->empresa_id}}" {{ old('empresa_id', $viaje->transporte->bus->empresa_id) == $bus->empresa_id ? '${seleccionar}' : ''  }}>{{$bus->empresa->nombre}}</option>`;
                            nombre_empresa.push("{{$bus->empresa->nombre}}");
                        } 
                    }
                }
            @endforeach
            if (html == "<option></option>" ){
                if ({{$viaje->transporte->departamento_id}} == val) {
                    html = html + `<option value="{{$viaje->transporte->bus->empresa_id}}" selected>{{$viaje->transporte->bus->empresa->nombre}}</option>`;
                } else if (val != -1) html="<option> [ No disponibles para hoy ]</option>";  
            }    
            document.getElementById("empresa_id").innerHTML = html;
            if (seleccionar == "") bus(-1);
        }

        function bus(val, seleccionar =""){       
            var cod = document.getElementById("departamento_id").value; 
            var html ="<option></option>";
            var option_bus = false;
            @foreach($buses as $bus)
                if({{$bus->empresa->id}} == val && {{$bus->transporte->departamento_id}} == cod){
                    var is_now = false;
                    @foreach(App\Transporte::find($bus->transporte->id)->viajes as $fecha)
                        if ("{{$fecha->fecha}}" == fecha()) is_now = true;
                    @endforeach
                    if(is_now == false || {{$viaje->transporte_id}} == {{$bus->transporte->id}}){
                        html = html + `<option value="{{$bus->id}}" {{ old('bus_id', $viaje->transporte->bus_id)== $bus->id ? '${seleccionar}' : ''  }}>{{$bus->tipo_bus }} ( P: {{$bus->placa}} - M: {{$bus->modelo}} )</option>`;
                    }
                }
            @endforeach    

            if (html == "<option></option>" ){
                if ({{$viaje->transporte->bus->empresa_id}} == val) {
                    html = html + `<option value="{{$viaje->transporte->bus_id}}" >{{$viaje->transporte->bus->tipo_bus }} ( P: {{$viaje->transporte->bus->placa}} - M: {{$viaje->transporte->bus->modelo}} )</option>`;
                } 
            }   
            document.getElementById("bus_id").innerHTML = html;     
        }

        
    </script>
@endsection