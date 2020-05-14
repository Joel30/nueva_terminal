<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Transporte;

class Bus extends Model
{
    protected $table = 'buses';

    public function transporte() {
        return $this->hasOne(Transporte::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    function guardar($request){
        
        
        $data = $request->validate([
            'tipo_bus' => '',
            'empresa_id' => '',
            'placa' => 'unique:buses',
            'modelo' => '',
            'color' => '',
        ]);
        Bus::create($data);
        /*$bus = new Bus;
        $bus->tipo_bus = $request['tipo_bus'];
        $bus->placa = $request['placa'];
        $bus->modelo = $request['modelo'];
        $bus->color = $request ['color'];
        $bus->save($data);*/
    }

    protected $fillable = [
        'empresa_id', 'tipo_bus', 'placa', 'modelo', 'color',
    ];

    function actualizar($request, Bus $bus){
        $data = $request->validate([
            'tipo_bus' => '',
            'empresa_id' => '',
            'placa' => [Rule::unique('buses')->ignore($bus->id)],
            'modelo' => '',
            'color' => '',
        ]);
        $bus->update($data);
    }
    
}
