<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('ample/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body style="background-color:#012733">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-md-offset-2">
                    <div class="card bg-info">
                        <div class="card-header text-white text-center h4" style="background-color:#03afe6">Iniciar Sesión</div>
                            <div class="card-body bg-white">
                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="email">Usuario</label>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email')}}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group ">
                                        <label for="password">Contraseña</label>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-7 ">
                                            <button type="submit" class="btn btn-info btn-block" style="background-color:#03afe6">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

