<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Transporte;
use App\Bus;

class Empresa extends Model
{
    protected $table = "empresas";

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }

    public function buses() {
        return $this->hasMany(Bus::class);
    }

    protected $fillable = [
        'nombre', 'nro_oficina', 'telefono', 'celular', 'responsable',
    ];

    function guardar($request){
        $data = $request->validate([
            'nombre' => 'unique:empresas',
            'nro_oficina' => 'unique:empresas',
            'telefono' => '',
            'celular' => '',
            'responsable' => '',
        ]);

        Empresa::create($data);
    }

    function actualizar($request, Empresa $empresa){
        $data = $request->validate([
            'nombre' => [Rule::unique('empresas')->ignore($empresa->id)],
            'nro_oficina' => [Rule::unique('empresas')->ignore($empresa->id)],
            'telefono' => '',
            'celular' => '',
            'responsable' => '',
        ]);

        $empresa->update($data);
    }
}
