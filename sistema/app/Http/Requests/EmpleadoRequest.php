<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Nombre'=> 'required|max:150',
            'Apellido_Paterno'=>'required|max:120',
            'Apellido_Materno'=>'required|max:120',
            'Correo'=> 'required|max:80',
            'Telefono'=> 'required|max:120',
        ];
    }
}
