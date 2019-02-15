<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    #<- Laravel automáticamente buscará una tabla en la base de datos con el nombre en minuscula y plural
    protected $fillable = ['nombre', 'email', 'mensaje']; #<- Especifica en la asignación masiva que campos se van a considerar
}
