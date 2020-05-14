<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\User;

class Personal extends Model
{
    protected $table = 'personal';

    public function usuario() {
        return $this->hasOne(User::class);
    }

    protected $fillable = [
        'nombre', 'apellido_paterno', 'apellido_materno', 'ci', 'fecha_nacimiento', 'celular', 'direccion', 'cargo',
    ];

    function guardar($request){
        $data = $request->validate([
            'nombre' => '', 
            'apellido_paterno' => '',
            'apellido_materno' => '', 
            'ci' => 'unique:personal', 
            'fecha_nacimiento' => '', 
            'celular' => '', 
            'direccion' => '', 
            'cargo' => '',
        ]);

        Personal::create($data);
    }

    function actualizar($request, Personal $personal){
        $data = $request->validate([
            'nombre' => '', 
            'apellido_paterno' => '',
            'apellido_materno' => '', 
            'ci' => [Rule::unique('personal')->ignore($personal->id)], 
            'fecha_nacimiento' => '', 
            'celular' => '', 
            'direccion' => '', 
            'cargo' => '',
        ]);
        $personal->update($data);
    }
}
