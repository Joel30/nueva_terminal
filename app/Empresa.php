<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\Transporte;
use App\Bus;

class Empresa extends Model
{
    use SoftDeletes;

    protected $table = "empresas";
    protected $dates = ['deleted_at'];

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
            'nombre' => 'required|unique:empresas',
            'nro_oficina' => 'required|unique:empresas',
            'telefono' => '',
            'celular' => 'required',
            'responsable' => 'required',
        ]);

        Empresa::create($data);
    }

    function actualizar($request, Empresa $empresa){
        $data = $request->validate([
            'nombre' => [
                'required',
                Rule::unique('empresas')->ignore($empresa->id)
            ],
            'nro_oficina' => [
                'required',
                Rule::unique('empresas')->ignore($empresa->id)
            ],
            'telefono' => '',
            'celular' => 'required',
            'responsable' => 'required',
        ]);

        $empresa->update($data);
    }
}
