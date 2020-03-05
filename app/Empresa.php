<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transporte;

class Empresa extends Model
{
    protected $table = "empresas";

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }

    protected $fillable = [
        'nombre', 'nro_oficina', 'telefono', 'celular', 'responsable',
    ];

    function guardar($request){
        $data = $request->validate([
            'nombre' => '',
            'nro_oficina' => '',
            'telefono' => '',
            'celular' => '',
            'responsable' => '',
        ]);

        Empresa::create($data);
    }

    function actualizar($request, Empresa $empresa){
        $data = $request->validate([
            'nombre' => '',
            'nro_oficina' => '',
            'telefono' => '',
            'celular' => '',
            'responsable' => '',
        ]);

        $empresa->update($data);
    }
}
