<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transporte;

class Bus extends Model
{
    protected $table = 'buses';

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }

    function guardar($request){
        
        
        $data = $request->validate([
            'tipo_bus' => '',
            'placa' => '',
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
        'tipo_bus', 'placa', 'modelo', 'color',
    ];

    function actualizar($request, Bus $bus){
        $data = $request->validate([
            'tipo_bus' => '',
            'placa' => '',
            'modelo' => '',
            'color' => '',
        ]);
        $bus->update($data);
    }
    
}
