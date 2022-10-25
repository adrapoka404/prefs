<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest
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
            'blog.title'     => "required|min:5|max:100",
            'blog.body'     => "required|min:20",
        ];
    }

    public function messages() {
        return [
            "blog.title.required" => "El campo de título es requerido",
            "blog.title.min" => "El campo de título debe contener al menos cinco caracteres",
            "blog.title.max" => "El campo de título debe contener máximo cien caracteres",
            "blog.body.required" => "El campo de Contenido es requerido",
            "blog.body.min" => "El campo de Contenido debe contener al menos veinte caracteres",

        ];
    }
}
