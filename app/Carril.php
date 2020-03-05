<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
            'carril' => '',
            'anden' => '',
        ]);
        
        Carril::create($data);
    }

    function actualizar($request, Carril $carril){
        $data = $request->validate([
            'carril' => '',
            'anden' => '', 
        ]);

        $carril->update($data);
    }
}
