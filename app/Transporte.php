<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bus;
use App\Departamento;
use App\Carril;
use App\Empresa;
use App\Viaje;

class Transporte extends Model
{
    protected $table = "transportes";

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function carril(){
        return $this->belongsTo(Carril::class);
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }

    public function viajes() {
        return $this->hasMany(Viaje::class);
    }

    protected $fillable = [
        'departamento_id', 'empresa_id', 'carril_id', 'bus_id',
    ];

    function guardar($request){
        //dd($request);
        $data = $request->validate([
            'departamento_id' => '', 
            'empresa_id' => '', 
            'carril_id' => '', 
            'bus_id' => '', 
        ]);
        
        Transporte::create($data);
    }

    function actualizar($request, $transporte){
        //dd($request);
        $data = $request->validate([
            'departamento_id' => '', 
            'empresa_id' => '', 
            'carril_id' => '', 
            'bus_id' => '', 
        ]);
        // llegada = 1(true) , salida = 0(false)
        $transporte->update($data);
    }
}
