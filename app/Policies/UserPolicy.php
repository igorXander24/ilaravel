<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability) {
        /**
        if($user->hasRoles(['Admin'])) {
            return true;
        }
        */

        if($user->isAdmin()) {
            return true;
        }
    }

    #<- debe tener el mismo nombre del método del controlador
    #<- $authUser, Usuario autenticado
    #<- Usuario que queremos ver
    public function edit(User $authUser, User $user) {

        //dd($authUser, $user);
        return $authUser->id === $user->id; #<- Solo deja pasar si el usuario autenticado es el mismo al usuario que se quiere ver
    }

    public function update(User $authUser, User $user) {

        //dd($authUser, $user);
        return $authUser->id === $user->id; #<- Solo deja pasar si el usuario autenticado es el mismo al usuario que se quiere ver
    }

    public function destroy(User $authUser, User $user) {

        //dd($authUser, $user);
        return $authUser->id === $user->id; #<- Solo deja pasar si el usuario autenticado es el mismo al usuario que se quiere ver
    }
}
