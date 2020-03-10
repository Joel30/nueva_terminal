<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rule;
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

        $data['password'] = bcrypt($request->password);
        
        User::create($data);
    }

    function actualizar($request, $usuario){
        $data = $request->validate([
            'personal_id' => '',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($usuario->id)
                ],
            'password' => '',
        ]);
        
        if ($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);
    }

    function autorizarRol($roles){
        if($this->tieneAlgunRol($roles)){
            return true;
        }
        abort(401, 'Esta accion no esta autorizada');
    }

    function tieneAlgunRol($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->tieneRol($role)){
                    return true;
                }
            }
        } else {
            if($this->tieneRol($roles)){
                return true;
            }
        }
        return false;
    }
    
    function tieneRol($rol){
        if($this->personal()->where('cargo', $rol)->first()){
            return true;
        }

        return false;
    }
}
