<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use App\Transporte;

class Carril extends Model
{
    protected $table = 'carriles';

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }

    protected $fillable = [
        'carril', 'anden',
    ];

    function guardar($request){
        
        $data = $request->validate([
            'carril' => 'unique:carriles',
            'anden' => '',
        ]);
        
        Carril::create($data);
    }

    function actualizar($request, Carril $carril){
        $data = $request->validate([
            'carril' => [Rule::unique('carriles')->ignore($carril->id)],
            'anden' => '', 
        ]);

        $carril->update($data);
    }
}
