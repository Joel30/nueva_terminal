<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\Transporte;

class Carril extends Model
{
    use SoftDeletes;
    
    protected $table = 'carriles';
    protected $dates = ['deleted_at'];

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }

    protected $fillable = [
        'carril', 'anden',
    ];

    function guardar($request){
        
        $data = $request->validate([
            'carril' => 'required|unique:carriles',
            'anden' => 'required',
        ]);
        
        Carril::create($data);
    }

    function actualizar($request, Carril $carril){
        $data = $request->validate([
            'carril' => [
                'required',
                Rule::unique('carriles')->ignore($carril->id)
            ],
            'anden' => 'required', 
        ]);

        $carril->update($data);
    }
}
