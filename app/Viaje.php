<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Validation\Rule;
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

        $transporte_id = Transporte::where('departamento_id',$request->departamento_id)
            ->where('bus_id', $request->bus_id)
            ->get()[0]->id; 
        $t = Transporte::find($transporte_id);
        //dd($re);
        $data['transporte_id'] = $transporte_id;
        $data['departamento'] = $t->departamento;
        $data['empresa'] = $t->bus->empresa;
        $data['carril'] = $t->carril;
        $data['bus'] = $t->bus;
        
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

        $transporte_id = Transporte::where('departamento_id',$request->departamento_id)
            ->where('bus_id', $request->bus_id)
            ->get()[0]->id; 
        $t = Transporte::find($transporte_id);
        $data['transporte_id'] = $transporte_id;
        $data['departamento'] = $t->departamento;
        $data['empresa'] = $t->bus->empresa;
        $data['carril'] = $t->carril;
        $data['bus'] = $t->bus;
        
        $viaje->update($data);
    }
}
