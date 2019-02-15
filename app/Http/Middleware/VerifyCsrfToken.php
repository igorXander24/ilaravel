<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        #'contacto'
        #<- VIDEO 12 Tratado sobre los middlewares
        #<- un middleware es un guardian, una capa que intercepta las peticiones del usuario y verifica que cumplan
        #<- unas reglas, si cumplen lo deja pasar y si no, no pues
    ];
}
