<?php

namespace App\Http\Middleware;

use Closure;

class Example
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    #<- Método handle
    public function handle($request, Closure $next)
    {
        #<- Si la condición se cumple, continua, caso contrario se agrega un response con código 404 o 403
        #<- Para nombrar un middleware se debe de hacer de manera que identifique la accion que va a verificar
        if(false) {
            return $next($request);
        }
        return response("No puedes continuar", 404);

    }
}
