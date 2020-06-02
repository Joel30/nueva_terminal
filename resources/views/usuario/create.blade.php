@extends('layouts.app')

@section('title') 
    <a href="{{route('usuario.index')}}" class="btn btn-danger py-1 ">
        <i class="fa fa-chevron-left fa-fw" aria-hidden="true"></i>
        Regresar
    </a> 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href="{{route('usuario.index')}}">Usuario</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
@endsection

@section('content')
    <form method="POST" action="{{route('usuario.guardar')}}" onsubmit="prevent_multiple_submits()">
        
        {{ csrf_field() }}
        
        <div class="form-group row">
            <label for="personal_id" class="col-md-4 col-form-label text-md-right">Nombre: </label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('personal_id') ? ' is-invalid' : '' }}" name="personal_id" id="personal_id" required autofocus>
                    <option> </option>
                    @foreach($personal as $personal)
                        <option value="{{$personal->id}}" {{ old('personal_id')== $personal->id ? 'selected' : ''  }}>{{$personal->nombre}} {{$personal->apellido_paterno}} {{$personal->apellido_materno}}</option>
                    @endforeach
                </select>
                @if ($errors->has('personal_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('personal_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail: </label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email')}}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password: </label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Password: </label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required autofocus>

                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-4">
                <button id="register_btn" type="submit" class="btn btn-primary1 btn-block mt-4">
                    Guardar
                </button>
            </div>
        </div>
    </form>
@endsection