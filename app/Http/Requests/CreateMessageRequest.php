<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
    #<- Aqui se programa la lógica de programación
 */
class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    #<- Determina si el usuario esta autorizado para realizar la accion
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #<- Retorna un array de reglas de validación
    public function rules()
    {
        return [
            "nombre"    => "required",
            "email"     => ["required", "email"],
            "mensaje"   => ["required", "min:5"]
        ];
    }
}
