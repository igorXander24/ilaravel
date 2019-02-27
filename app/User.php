<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    #<- aqui se define la relación del usuario con el rol
    #<- Aqui se define la relación en ELOQUENT, el usuario pertenece a un ROL
    #<- Acceder al rol a traves del usuario
    public function roles() {
        #return $this->belongsTo(Role::class);
        return $this->belongsToMany(Role::class, "assigned_roles"); #<- en las relaciones de muchos a muchos
        #<- se debe especificar la tabla si se personaliza el nombre
        #<-
    }

    #<- Método encargado de comparar los roles
    public function hasRoles(array $roles) {
        #return $this->role === $role;
        #dd($this->role);

        foreach ($roles as $role) {
            foreach ($this->roles as $userRole) {
                if($userRole->name === $role) {
                    return true;
                }
            }
        }
        return false;
    }
}
