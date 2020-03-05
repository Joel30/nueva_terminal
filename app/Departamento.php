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
        'nombre',
    ];

    function guardar($request){
        $data = $request->validate([
            'nombre' => '',
        ]);

        Departamento::create($data);
    }

    function actualizar($request, Departamento $departamento){
        $data = $request->validate([
            'nombre' => '',
        ]);

        $departamento->update($data);
    }
}
