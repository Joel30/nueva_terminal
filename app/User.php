<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Personal;

class User extends Authenticatable
{
    use Notifiable;

    //protected $table = "users";
    
    public function personal(){
        return $this->belongsTo(Personal::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'personal_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function guardar($request){
        $data = $request->validate([
            'personal_id' => '',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create($data);
    }

    function actualizar($request, $usuario){
        $data = $request->validate([
            'personal_id' => '',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:6|confirmed',
        ]);

        $usuario->update($data);
    }
}
