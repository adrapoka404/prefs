<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocument extends FormRequest
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
            "title" => "required|min:5|max:50",
            "file" => "required",
            "roles" => "required",
        ];
    }

    public function messages(){
        return [
            "title.required"    => "El documento requiete de un título",
            "title.min"         => "El título debe contener al menos cinco caracteres",
            "title.max"         => "El título debe contener máximo cincuenta caracteres",
            "file.required"     => "El archivo es requerido",
            "roles.required"    => "Elija al menos un Role al que se le permite descargar el archivo",
        ];
    }
}
