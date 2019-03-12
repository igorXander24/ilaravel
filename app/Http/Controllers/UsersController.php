<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{

    function __construct()
    {
        /*
        $this->middleware([
            'auth',
            'roles:Admin,estudiante'
        ]);
        */

        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('roles:Admin', ['except' => ['edit', 'update', 'show']]); #<- Ignorar el método edit.

        #$this->middleware('roles');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) /**<- POLICY, verifica si el usuario que está visitando la ruta, es el mismo que está consultado la bd*/
    {
        //
        $user = User::findOrFail($id);

        #<- Antes de continuar o devolver la vista, se hacen uso de políticas

        $this->authorize('edit', $user);
        /**<- Puede ser algo confuso ya que solo le estamos pasando un parámetro, pero el método recibe dos parametros
            lo que sucede es que el primer parámetro siempre es el usuario autenticado, y laravel lo pasa automáticamente.
         */


        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        $user->update($request->all());
        return back()->with('info', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);

        $this->authorize('delete', $user);
        $user->delete();

        return back();
    }
}
