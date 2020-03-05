<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nueva Terminal</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="mt-5">
    
                <!--a href="{{url()->previous()}}" class="btn btn-info btn-sm mb-5">Regresar</a-->
                <a href="javascript:history.back(-1);" class="btn btn-info btn-sm mb-5">Regresar</a>
                @yield('content')
            </div>
        </div>
    </body>
</html>