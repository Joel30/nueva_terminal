<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transporte;

class Bus extends Model
{
    protected $table = 'buses';

    public function transportes() {
        return $this->hasMany(Transporte::class);
    }
}
