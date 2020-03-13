@extends('layouts.app')

@section('title') <a href="{{route('personal.index')}}" class="btn btn-danger">PERSONAL</a> @endsection

@section('breadcrumb')
    <li> <a href="{{route('personal.index')}}">&nbsp;/ Personal</a></li>
    <li class="active">&nbsp;/ Editar</li>
@endsection

@section('content')
    <form method="POST" action="{{route('personal.actualizar', $personal)}}">
        
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre: </label>

            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$personal->nombre}}" required autofocus>

                @if ($errors->has('nombre'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-right">Apellido Paterno: </label>

            <div class="col-md-6">
                <input id="apellido_paterno" type="text" class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}" name="apellido_paterno" value="{{$personal->apellido_paterno}}" required autofocus>

                @if ($errors->has('apellido_paterno'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('apellido_paterno') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="apellido_materno" class="col-md-4 col-form-label text-md-right">Apellido Materno: </label>

            <div class="col-md-6">
                <input id="apellido_materno" type="text" class="form-control{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}" name="apellido_materno" value="{{$personal->apellido_materno}}" required autofocus>

                @if ($errors->has('apellido_materno'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('apellido_materno') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="ci" class="col-md-4 col-form-label text-md-right">Cédula de Identidad: </label>

            <div class="col-md-6">
                <input id="ci" type="text" class="form-control{{ $errors->has('ci') ? ' is-invalid' : '' }}" name="ci" value="{{$personal->ci}}" required autofocus>

                @if ($errors->has('ci'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('ci') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento: </label>

            <div class="col-md-6">
                <input id="fecha_nacimiento" type="date" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" name="fecha_nacimiento" value="{{$personal->fecha_nacimiento}}" required autofocus>

                @if ($errors->has('fecha_nacimiento'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="celular" class="col-md-4 col-form-label text-md-right">Celular: </label>

            <div class="col-md-6">
                <input id="celular" type="number" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{$personal->celular}}" required autofocus>

                @if ($errors->has('celular'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('celular') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección: </label>

            <div class="col-md-6">
                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{$personal->direccion}}" required autofocus>

                @if ($errors->has('direccion'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('direccion') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="cargo" class="col-md-4 col-form-label text-md-right">Cargo (Rol): </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" id="cargo" required>
                    <option value="Encargado" {{ old('cargo', $personal->cargo)=='Encargado' ? 'selected' : ''  }}>Encargado</option>
                    <option value="Administrador" {{ old('cargo', $personal->cargo)=='Administrador' ? 'selected' : ''  }}>Administrador</option>
                </select>
                @if ($errors->has('cargo'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('cargo') }}</strong>
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