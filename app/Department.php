<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransportList;

class Department extends Model
{
    protected $tabla = 'departments';

    public function lista_transporte() {
        return $this->hasMany(TransportList::class);
    }
}
