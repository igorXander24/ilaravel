<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function user() {
        #<- Tiene uno
        #return $this->hasOne(User::class); #<- Los usuarios con este rol

        #<- Tiene muchos
        return $this->hasMany(User::class);
    }
}
