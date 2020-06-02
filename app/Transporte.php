<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\Bus;
use App\Departamento;
use App\Carril;
use App\Empresa;
use App\Viaje;

class Transporte extends Model
{
    use SoftDeletes;

    protected $table = "transportes";
    protected $dates = ['deleted_at'];

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
            'departamento_id' => 'required', 
            'carril_id' => 'required', 
            'bus_id' => 'required|unique:transportes',
            'hora' => 'required', 
            'estado' => 'required', 
        ]);
        
        Transporte::create($data);
    }

    function actualizar($request, $transporte){
        //dd($request);
        $data = $request->validate([
            'departamento_id' => 'required', 
            'carril_id' => 'required', 
            'bus_id' => [
                'required',
                Rule::unique('transportes')->ignore($transporte->id)
            ], 
            'hora' => 'required', 
            'estado' => 'required', 
        ]);
        // llegada = 1(true) , salida = 0(false)
        $transporte->update($data);
    }
}
