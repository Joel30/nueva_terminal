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
}
