<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransportList;

class Bus extends Model
{
    protected $tabla = 'buses';

    public function lista_transporte() {
        return $this->hasMany(TransportList::class);
    }
}
