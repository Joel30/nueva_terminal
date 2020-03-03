<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transporte;

class Empresa extends Model
{
    protected $table = "empresas";

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }
}
