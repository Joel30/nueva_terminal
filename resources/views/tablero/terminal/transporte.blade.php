
<div class="row px-2">
@foreach($transportes as $transporte)
    <div class="col-sm-6 col-md-4 col-xl-3 mb-3 px-2 text-center">
        <div class="card shadow bg-white rounded">
            <div class="card-body py-3">
                <h5 class="card-title bg-light m-0">{{$transporte->bus->empresa->nombre}}</h5>
                <b class="m-0 text-primary">Bus {{ $transporte->bus->tipo_bus }}</b>
                <p class="m-0 text-secondary text-monospace">Anden(<b>{{ $transporte->carril->anden }}</b>) - Carril(<b>{{ $transporte->carril->carril }}</b>)</p>
                <h5 class="m-0 text-right">{{ $transporte->hora }}</h5>
                <p class="m-0 text-right text-wrap"><span class="badge badge-light">{{ $transporte->bus->empresa->telefono }}</span></p>
            </div>
        </div>
    </div>
    @endforeach
</div>