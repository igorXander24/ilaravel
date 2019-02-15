<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller #<- Extiende de un controlador base.
{
    /*
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    */

    #<- CLASE 12
    #<- Otra manera de gestionar un middleware desde el controlador
    public function __construct()
    {
        #<- $this->middleware('example'); #<- De esta forma se esta aplicando a todos los métodos de este
        #<- controlador [FORMA RECOMENDADA POR EL TUTOR]
        #<- Clase dedica a interceptar un request y verificar que se cumplan ciertas condiciones.
        /*
        $this->middleware('example', [
            'only' => [
                'home'
            ]
        ]);
        */

        #<- También se puede hacer lo opuesto
        $this->middleware('example', [
            'except' => [
                'home'
            ]
        ]);
    }

    public function home()
    {
        return view('home');

        # USO DEL RESPONSE
        /**
        return response('Contenido de la respuesta', 201)
            ->header('TOKEN', '123456')
            ->header('TOKEN2', 'mononoke')
            ->cookie('COOKIE-IGOR', 'oscarariel');
        */
    }

    /*

    public function contact()
    {
        return view('contactos');
    }
    */

    #public function mensajes(CreateMessageRequest $request)
    #{
        /*
        #return $request->all();
        if($request->has('nombre')) {
            return 'Si tiene nombre, y es: '. $request->input('nombre');
        } else {
            return 'No tiene nombre';
        }
        SISTEMA DE VALIDACIÓN DE LARAVEL,
        mientras mas capas de validación tengamos, mucho mejor.
        */
        /*
        $this->validate($request, [
            #<- Array con las reglas de validación
            "nombre"    => "required",
            "email"     => ["required", "email"],
            "mensaje"   => ["required", "min:5"] #<- Si quieres ver las demas reglas de validacion ve a la documentación
            #<- Cuando el formulario es pequeño tener la validación dentro del controlador no da problemas.
            #<- Si son muchos los campos, lo mejor es crear requetsobjetc
        ]);

        */

        #<- VIDEO 11
        #<- Si se retorna un array se transforma automáticamente en JSON
        /*
        $data = $request->all();
        return response()->json([
            'data' => $data
        ], 202)
            ->header('TOKEN', '123456789');
        */

        /** #<- Puede ser usado como la siguiente manera
        return redirect()->route('contactos')
            ->with('info', 'Tu mensaje ha sido enviado');
        */

        #<- Resumen de lo anterior ^
    #    $data = $request->all();
    #    return back()
    #        ->with('info', 'Tu mensaje ha sido enviado correctamente'); #<- Los mensajes con with solo estan disponibles en
    #            #<- ese instante que se envia el request, luego de eso el valor se elimina totalmente de la session

    #}

    public function saludo($nombre = "Invitado")
    {
        #<- return view('saludo', ["nombre" => $nombre]); MODO 1
        $html = '
        <table border="1">
            <tbody>
                <tr><td>Voce a Vita, dame a Vita</td></tr>
            </tbody>
            <thead>
                <tr><td>Mouse</td></tr>
            </thead>
        </table>
    ';
        $script = "
        <script>
            alert('Problema XSS - Cross Site Scripting!');
        </script>
    ";

        $colores = [
            'Verde',
            'Gris',
            'Rosa',
            'Turquesa'
        ];

        $comidas = [

        ];

        $ciudades = [
            'Chimbote',
            'Santa'
        ];

        return view('saludo', compact('nombre','html', 'script', 'colores', 'comidas', 'ciudades'));
        #<- Compact es una función de php, es de argumentos variables
    }
}
