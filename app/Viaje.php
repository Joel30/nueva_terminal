<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Transporte;

class Viaje extends Model
{
    use SoftDeletes;

    protected $table = "viajes";
    protected $dates = ['deleted_at'];

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
        $data = $request->validate([
            'fecha'=> 'required', 
            'hora'=> 'required', 
            'estado' => 'required', 
            'llegada_salida' => 'required',
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
        
        Viaje::create($data);
    }

    function copiar($request){
        $viajes = $request->all();
        unset($viajes['_token'],$viajes['item']);

        foreach ($viajes as $valor){
            $v = Viaje::find($valor);
            $t = Transporte::find($v->transporte_id);
            $data = [
                'transporte_id' => $t->id,
                'departamento' => $t->departamento,
                'empresa' => $t->bus->empresa,
                'carril' => $t->carril,
                'bus' => $t->bus,
                'fecha' => Carbon::now(),
                'hora' => $v->hora,
                'estado' => $v->estado,
                'llegada_salida' => $v->llegada_salida,
            ];
            Viaje::create($data);
        }
    }

    function actualizar($request, $viaje){
        $data = $request->validate([
            'fecha'=> 'required', 
            'hora'=> 'required', 
            'estado' => 'required', 
            'llegada_salida' => 'required',
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
