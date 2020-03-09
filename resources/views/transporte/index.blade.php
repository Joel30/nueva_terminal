@extends('layouts.app')

@section('content')

    <div class="col-8">
        <div class="input-group">
            <input type="text" class="form-control" id="texto" placeholder="Ingrese nombre">
            <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
        </div>
        
    </div> <br>
    <div>
        <a href="{{route('transporte.nuevo')}}" class="btn btn-primary mb-3">Nuevo</a>
        <a href="{{route('transporte.tablero')}}" class="btn btn-success mb-3">Tablero</a> <br>

    </div> 
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Destino</th>
                <th>Empresa de Transporte</th>
                <th>Telefono</th>
                <th>Anden</th>
                <th>Carril</th>
                <th>Tipo de Bus</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>salida/llegada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="resultados">
            @include('transporte/buscar')
        </tbody>
    </table>


    <script>

        window.addEventListener('load',function(){
            document.getElementById("texto").addEventListener("keyup", () => {
                if((document.getElementById("texto").value.length)>=0)
                    fetch(`/transporte/buscar?texto=${document.getElementById("texto").value}`,{ method:'get' })
                    .then(response  =>  response.text() )
                    .then(html      =>  {   document.getElementById("resultados").innerHTML = html  })
                else
                    document.getElementById("resultados").innerHTML = ""
            })
        }); 
    </script>
@endsection