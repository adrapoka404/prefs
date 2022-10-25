<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
            'company.name'          => 'required|min:3|max:50',
            'company.status'        => 'required',
            'company.description'   => 'required|min:20|max:250',
            'company.address'       => 'required|min:20|max:250',
            'company.lat'           => 'nullable|between:-90,90',
            'company.lon'          => 'nullable|between:-180,180',
        ];
    }

    public function messages()
    {
        return [
            'company.name.required'         => 'El campo Nombre es requerido',
            'company.name.min'              => 'El campo Nombre debe tener mínimo 3 caracteres',
            'company.name.max'              => 'El campo Nombre debe tener máximo 50 caracteres',
            'company.status.required'       => 'El campo de Estado es requerido',
            'company.address.required'      => 'El campo Dirección es requerido',
            'company.address.min'           => 'El campo Dirección debe tener mínimo 20 caracteres',
            'company.address.max'           => 'El campo Dirección debe tener máximo 250 caracteres',
            'company.lat.between'           => 'El campo Latitud no es un formato valido para coordenada',
            'company.lon.between'           => 'El campo Longitud no es un formato valido para coordenada',
            'company.description.required'  => 'El campo Descripción es requerido',
            'company.description.min'       => 'El campo Descripción debe tener mínimo 20 caracteres',
            'company.description.max'       => 'El campo Descripción debe tener máximo 250 caracteres',
        ];
    }
}
