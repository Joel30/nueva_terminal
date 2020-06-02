<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\Transporte;

class Departamento extends Model
{
    use SoftDeletes;

    protected $table = 'departamentos';
    protected $dates = ['deleted_at'];

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }

    protected $fillable = [
        'destino', 'tipo',
    ];

    function guardar($request){
        $data = $request->validate([
            'destino' => 'required|unique:departamentos',
            'tipo' => 'required',
        ]);

        Departamento::create($data);
    }

    function actualizar($request, Departamento $departamento){
        $data = $request->validate([
            'destino' => ['required',
                Rule::unique('departamentos')->ignore($departamento->id)
            ],
            'tipo' => 'required',
        ]);

        $departamento->update($data);
    }
}
