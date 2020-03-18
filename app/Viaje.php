<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transporte;

class Viaje extends Model
{
    protected $table = "viajes";

    public function transporte(){
        return $this->belongsTo(Transporte::class);
    }

    protected $fillable = [
        'transporte_id', 'fecha', 'hora', 'estado', 'llegada_salida',
    ];

    function guardar($request){
        //dd($request);
        $data = $request->validate([
            'transporte_id' => '',  
            'fecha'=> '', 
            'hora'=> '', 
            'estado' => '', 
            'llegada_salida' => '',
        ]);

        $data['llegada_salida']=='llegada' ? $data['llegada_salida'] = true : $data['llegada_salida'] = false;
        
        Viaje::create($data);
    }

    function actualizar($request, $viaje){
        //dd($request);
        $data = $request->validate([
            'transporte_id' => '',  
            'fecha'=> '', 
            'hora'=> '', 
            'estado' => '', 
            'llegada_salida' => '',
        ]);
        // llegada = 1(true) , salida = 0(false)
        $data['llegada_salida']=='llegada' ? $data['llegada_salida'] = true : $data['llegada_salida'] = false; 
        $viaje->update($data);
    }
}
