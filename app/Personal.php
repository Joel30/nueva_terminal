<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Personal extends Model
{
    protected $table = 'personal';

    public function usuario() {
        return $this->hasOne(User::class);
    }
}
