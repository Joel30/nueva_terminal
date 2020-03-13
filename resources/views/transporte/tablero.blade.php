@extends('layouts.app')

@section('title')
    Vusualización de Información de Buses
@endsection

@section('breadcrumb')
    <li class="active"></li>
@endsection

@section('content')
    
    <img src="https://previews.123rf.com/images/mathess/mathess1612/mathess161200609/69580248-potos%C3%8D-bolivia-20-de-abril-2015-interior-de-la-terminal-de-autobuses-en-potos%C3%AD-bolivia.jpg" alt="" width="100%" height="500px">
        
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
@endsection