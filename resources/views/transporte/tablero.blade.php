<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Terminal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    
    <img src="https://previews.123rf.com/images/mathess/mathess1612/mathess161200609/69580248-potos%C3%8D-bolivia-20-de-abril-2015-interior-de-la-terminal-de-autobuses-en-potos%C3%AD-bolivia.jpg" alt="" width="100%" height="500px">
        
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Destino</th>
                <th>Empresa de Transporte</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>salida/llegada</th>
            </tr>
        </thead>
        <tbody id="seccionload">
            
        </tbody>
    </table>

    <script type="text/javascript">
        var contador = 1;
        var ejecutar = setInterval(imprimir,2000);

        function imprimir(){
            //document.write("Contando" + contador + "<br/>");
            contador ++;
            fetch('/transporte/datos_tablero',{ method:'get' })
            .then(response  =>  response.text() )
            .then(html      =>  {   document.getElementById("seccionload").innerHTML = html  });
        }
       
    </script>
</body>
</html>