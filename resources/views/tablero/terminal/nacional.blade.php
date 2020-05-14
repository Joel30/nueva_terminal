<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/image1.jpg')}}">
    <title>Nueva Terminal</title>
    <link href=" {{asset('ample/css/style.css')}}" rel="stylesheet">
    <link href=" {{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('ample/bootstrap/bootstrap.min.css')}}" crossorigin="anonymous">
    
</head>
<body>
    <div class="input-group mb-3 col-sm-8 col-md-7 col-lg-5 col-xl-4">
        <div class="input-group-prepend ">
            <label class="input-group-text input-red" for="departamento">DESTINO</label>
        </div>
            <select class="custom-select borde-red text-uppercase" name="departamento" id="departamento" onchange="search(this.value)" required>
                @foreach($departamentos as $id => $destino)
                    <option value="{{$destino}}" {{ old('departamento')=='$destino' ? 'selected' : ''  }}>{{$destino}}</option>
                @endforeach
            </select>
    </div>
    <div id="nacional">
        @include('tablero.terminal.transporte')
    </div>

    <script>
        function search(val){
            fetch('{{route('terminal.destino')}}?tipo=Nacional&destino='+val,{ method:'get' })
            .then(response  =>  response.text() )
            .then(html      =>  {   document.getElementById("nacional").innerHTML = html  });
        }
    </script>
</body>
</html>