<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'employee.name'     => 'required|min:3|max:50',
            'employee.surname'  => 'required|min:3|max:50',
            'employee.mail'    => 'required|email',
            'employee.company'  => 'required',
            'employee.position' => 'required',
            'employee.mobile'   => 'required|digits:10',
            'employee.birthday' => 'required|date',
            'employee.daydeath' => 'nullable|date',
            'employee.nss'      => 'required|digits:11',
            'employee.zip'      => 'required',
            'employee.colony'   => 'required',
            'employee.address'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'employee.name.required' => 'El campo nombre de empleado es requerido',
            'employee.name.min' => 'E campo nombre de empleado debe contener al menos tres caracteres',
            'employee.name.max' => 'El campo nombre de empleado debe contener máximo 50 caracteres',
            'employee.surname.required' => 'El campo apellido es requerido',
            'employee.surname.min' => 'El campo apellido debe contener al menos tres caracteres',
            'employee.surname.max' => 'El campo de apellido debe contener máximo 50 caracteres',
            'employee.mail.required' => 'El campo de correo electrónico es requerido',
            'employee.mail.email' => 'El campo de correo electrónico no tiene un formato valido',
            'employee.company.required' => 'El campo de empresa es requerido',
            'employee.position.required' => 'El campo puesto es requerido',
            'employee.mobile.required' => 'El campo de teléfono es requerido',
            'employee.mobile.digits' => 'El campo de teléfono deben ser 10 digitos',
            'employee.birthday.required' => 'El campo fecha de nacimiento es requerido',
            'employee.birthday.date' => 'El campo fecha de nacimiento debe ser una fecha valida',
            'employee.daydeath.date' => 'El campo fecha de matrimonio debe ser una fecha valida',
            'employee.nss.required' => 'El campo NSS es requerido',
            'employee.nss.digits' => 'El campo NSS debe ser de 11 digitos',
            'employee.zip.required' => 'El campo código postal es requerido',
            'employee.colony.required' => 'El campo colonia es requerido',
            'employee.address.required' => 'El campo de dirección es requerido',  
        ];
    }
}
