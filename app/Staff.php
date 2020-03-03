<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Staff extends Model
{
    protected $tabla = 'staff';

    public function user() {
        return $this->hasOne(User::class);
    }
}
