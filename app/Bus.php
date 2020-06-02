<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\Transporte;

class Bus extends Model
{
    use SoftDeletes;

    protected $table = 'buses';
    protected $dates = ['deleted_at'];

    public function transporte() {
        return $this->hasOne(Transporte::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    protected $fillable = [
        'empresa_id', 'tipo_bus', 'placa', 'modelo', 'marca', 'color',
    ];

    function guardar($request){
        
        
        $data = $request->validate([
            'tipo_bus' => 'required',
            'empresa_id' => 'required',
            'placa' => 'required|unique:buses',
            'modelo' => '',
            'marca' => '',
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



    function actualizar($request, Bus $bus){
        $data = $request->validate([
            'tipo_bus' => 'required',
            'empresa_id' => 'required',
            'placa' => [
                'required',
                Rule::unique('buses')->ignore($bus->id)
            ],
            'modelo' => '',
            'marca' => '',
            'color' => '',
        ]);
        $bus->update($data);
    }
    
}
