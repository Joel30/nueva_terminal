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

    protected $casts = [ 
        'departamento' => 'array',
        'empresa' => 'array',
        'carril' => 'array',
        'bus' => 'array'
    ];

    protected $fillable = [
        'departamento', 'empresa', 'carril', 'bus' ,'transporte_id', 'fecha', 'hora', 'estado', 'llegada_salida',
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

        $t = Transporte::find($request->transporte_id);
        $data['departamento'] = $t->departamento;
        $data['empresa'] = $t->empresa;
        $data['carril'] = $t->carril;
        $data['bus'] = $t->bus;
        //dd($data);
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
        $t = Transporte::find($request->transporte_id);
        $data['departamento'] = $t->departamento;
        $data['empresa'] = $t->empresa;
        $data['carril'] = $t->carril;
        $data['bus'] = $t->bus;
        
        $data['llegada_salida']=='llegada' ? $data['llegada_salida'] = true : $data['llegada_salida'] = false; 
        $viaje->update($data);
    }
}
