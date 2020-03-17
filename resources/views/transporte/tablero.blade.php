
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('ample/bootstrap/bootstrap.min.css')}}" crossorigin="anonymous">
    <style type="text/css">
        html, body{ margin:0; padding:0; height:100%;}
        iframe { margin:0; padding:0; height:100%;}
        iframe { display:block; width:70%; border:none; }
        .div1 { margin:0; padding:0; height:70%;}
        .div1 { display:block; width:100%; border:none;}
        .div2 { margin:0; padding:0; height:30%;}
        .div2 { display:block; width:100%; border:none;}
        .ytp-chrome-top.ytp-show-cards-title {
            display: none;
        }
    </style>
</head>
<body>
        
    <!-- <img src="https://previews.123rf.com/images/mathess/mathess1612/mathess161200609/69580248-potos%C3%8D-bolivia-20-de-abril-2015-interior-de-la-terminal-de-autobuses-en-potos%C3%AD-bolivia.jpg" alt="" width="100%" height="500px"> -->
        
        <div align="center" class="div1 bg-info">
            <iframe src="https://www.youtube.com/embed/wLnyRcJHlhc?autoplay=1&controls=0&start=40&rel=0"></iframe>
        </div>
        <div class="div2">
            <table class="table">
                <thead class="text-center">
                    <tr style="background-color:#077afe">
                        <th colspan="7" class="p-2 h5 text-white">SALIDA Y LLEGADA DE BUSES</th>
                    </tr>
                    <tr style="background-color:#ceeafe;">
                        <th class="text-dark py-1">Destino</th>
                        <th class="text-dark py-1">Empresa de Transporte</th>
                        <th class="text-dark py-1">Anden</th>
                        <th class="text-dark py-1">Carril</th>
                        <th class="text-dark py-1">Hora</th>
                        <th class="text-dark py-1">Estado</th>
                        <th class="text-dark py-1">Salida / Llegada</th>
                    </tr>
                </thead>
                <tbody id="seccionload" class="text-white text-uppercase text-monospace">
                    
                </tbody>
            </table>
        </div>

    <script type="text/javascript">
        var contador = 1;
        var ejecutar = setInterval(imprimir,2000);

        function imprimir(){
            //document.write("Contando" + contador + "<br/>");
            contador ++;
            fetch('{{route('transporte.datos_tablero')}}',{ method:'get' })
            .then(response  =>  response.text() )
            .then(html      =>  {   document.getElementById("seccionload").innerHTML = html  });
        }
       
    </script>

</body>
</html>