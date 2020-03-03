<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransportList;

class Lane extends Model
{
    protected $tabla = 'lanes';

    public function lista_transporte() {
        return $this->hasMany(TransportList::class);
    }
}
