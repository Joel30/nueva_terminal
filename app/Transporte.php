<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bus;
use App\Departamento;
use App\Carril;
use App\Empresa;

class Transporte extends Model
{
    protected $table = "transportes";

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function carril(){
        return $this->belongsTo(Carril::class);
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
