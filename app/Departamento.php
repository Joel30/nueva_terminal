<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transporte;

class Departamento extends Model
{
    protected $table = 'departamentos';

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }

    protected $fillable = [
        'destino', 'tipo',
    ];

    function guardar($request){
        $data = $request->validate([
            'destino' => '',
            'tipo' => '',
        ]);

        Departamento::create($data);
    }

    function actualizar($request, Departamento $departamento){
        $data = $request->validate([
            'nombre' => '',
            'tipo' => '',
        ]);

        $departamento->update($data);
    }
}
