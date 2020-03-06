<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bus;
use App\Departamento;
use App\Carril;
use App\Empresa;

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

    protected $fillable = [
        'departamento_id', 'empresa_id', 'carril_id', 'bus_id', 'fecha', 'hora', 'estado', 'llegada_salida',
    ];

    function guardar($request){
        //dd($request);
        $data = $request->validate([
            'departamento_id' => '', 
            'empresa_id' => '', 
            'carril_id' => '', 
            'bus_id' => '', 
            'fecha'=> '', 
            'hora'=> '', 
            'estado' => '', 
            'llegada_salida' => '',
        ]);

        $data['llegada_salida']=='llegada' ? $data['llegada_salida'] = true : $data['llegada_salida'] = false;
        
        Transporte::create($data);
    }

    function actualizar($request, $transporte){
        //dd($request);
        $data = $request->validate([
            'departamento_id' => '', 
            'empresa_id' => '', 
            'carril_id' => '', 
            'bus_id' => '', 
            'fecha'=> '', 
            'hora'=> '', 
            'estado' => '', 
            'llegada_salida' => '',
        ]);
        // llegada = 1(true) , salida = 0(false)
        $data['llegada_salida']=='llegada' ? $data['llegada_salida'] = true : $data['llegada_salida'] = false; 
        $transporte->update($data);
    }
}
