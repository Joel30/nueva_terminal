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
}
