<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nueva Terminal</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <div class="container mt-5">
            <div>
                <a href="{{route('bus.index')}}" class="btn btn-info">bus</a>
                <a href="{{route('carril.index')}}" class="btn btn-info">carril</a>
                <a href="{{route('departamento.index')}}" class="btn btn-info">departamento</a>
                <a href="{{route('empresa.index')}}" class="btn btn-info">empresa</a>
                <a href="{{route('personal.index')}}" class="btn btn-info">personal</a>
                <a href="{{route('transporte.index')}}" class="btn btn-info">transporte</a>
                <a href="{{route('usuario.index')}}" class="btn btn-info">usuario</a>
            </div>
            
            <div class="mt-4">
                @yield('content')
            </div>
        </div>
    
    </body>
</html>