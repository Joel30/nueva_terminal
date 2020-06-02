<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\User;

class Personal extends Model
{
    use SoftDeletes;

    protected $table = 'personal';
    protected $dates = ['deleted_at'];

    public function usuario() {
        return $this->hasOne(User::class);
    }

    protected $fillable = [
        'nombre', 'apellido_paterno', 'apellido_materno', 'ci', 'fecha_nacimiento', 'celular', 'direccion', 'cargo',
    ];

    function guardar($request){
        $data = $request->validate([
            'nombre' => 'required', 
            'apellido_paterno' => '',
            'apellido_materno' => '', 
            'ci' => 'required|unique:personal', 
            'fecha_nacimiento' => 'required', 
            'celular' => '', 
            'direccion' => '', 
            'cargo' => 'required',
        ]);

        Personal::create($data);
    }

    function actualizar($request, Personal $personal){
        $data = $request->validate([
            'nombre' => 'required', 
            'apellido_paterno' => '',
            'apellido_materno' => '', 
            'ci' => [
                'required',
                Rule::unique('personal')->ignore($personal->id)
            ], 
            'fecha_nacimiento' => 'required', 
            'celular' => '', 
            'direccion' => '', 
            'cargo' => 'required',
        ]);
        $personal->update($data);
    }
}
