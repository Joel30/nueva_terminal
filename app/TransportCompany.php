<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransportList;

class TransportCompany extends Model
{
    protected $tabla = "transport_company";

    public function transport_list() {
        return $this->hasMany(TranspotList::class);
    }
}
