<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TDDPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    // Omitir la validación de autorización
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Si la validación falla, Laravel devuelve automáticamente un 422 Unprocessable Entity
        // porque es el estándar para indicar errores de validación en APIs RESTful.
        // Este código comunica claramente que la solicitud fue entendida, pero los datos enviados no son válidos según las reglas definidas.
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }
}
