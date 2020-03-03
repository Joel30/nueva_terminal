<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bus;
use App\Department;
use App\Lane;
use App\TransportCompany;

class TransportList extends Model
{
    protected $tabla = "transport_lists";

    public function departamento(){
        return $this->belongsTo(Departament::class);
    }

    public function empresan_transporte(){
        return $this->belongsTo(TransportCompany::class);
    }

    public function carril(){
        return $this->belongsTo(Lane::class);
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
