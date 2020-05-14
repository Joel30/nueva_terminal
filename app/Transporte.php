<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
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
        'departamento_id', 'carril_id', 'bus_id', 'hora', 'estado',
    ];

    function guardar($request){
        //dd($request);
        $data = $request->validate([
            'departamento_id' => '', 
            'carril_id' => '', 
            'bus_id' => 'unique:transportes',
            'hora' => '', 
            'estado' => '', 
        ]);
        
        Transporte::create($data);
    }

    function actualizar($request, $transporte){
        //dd($request);
        $data = $request->validate([
            'departamento_id' => '', 
            'carril_id' => '', 
            'bus_id' => [Rule::unique('transportes')->ignore($transporte->id)], 
            'hora' => '', 
            'estado' => '', 
        ]);
        // llegada = 1(true) , salida = 0(false)
        $transporte->update($data);
    }
}
