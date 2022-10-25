<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePosition extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'position.name'          => 'required|min:3|max:50',
            'position.status'        => 'required',
            'position.description'   => 'required|min:20|max:250',
        ];
    }

    public function messages()
    {
        return [
            'position.name.required'            => 'El campo Nombre es requerido',
            'position.name.min'                 => 'El campo Nombre debe tener mínimo 3 caracteres',
            'position.name.max'                 => 'El campo Nombre debe tener máximo 50 caracteres',
            'position.status.required'          => 'El campo Estado es requerido',
            'position.description.required'     => 'El campo Descripción es requerido',
            'position.description.min'          => 'El campo Descripción debe tener mínimo 20 caracteres',
            'position.description.max'          => 'El campo Descripción debe tener máximo 250 caracteres',
        ];
    }
}
