<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
    public function prepareForValidation(){
        if($this->nombre!=null && $this->apellido!=null){
            $this->merge([
                'nombre'=>ucwords($this->nombre),
                'apellido'=>ucwords($this->apellido),
                'dni'=>strtoupper($this->dni)
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method()=='PUT'){
            return [
            'nombre'=>['required'],
            'apellido'=>['required'],
            'dni'=>['required','unique:users,dni', 'min:9','regex:/^[XYZxyz]?([0-9]{7,8})([A-Za-z])$/i', 'max:9','unique:empleados,dni','unique:clientes,dni,'.$this->cliente->id],
            'telefono'=>['required'],
            'mail'=>['required','unique:users,email','unique:empleados,email','unique:clientes,email,'.$this->cliente->id]
        ];
        }else{
            return [
                'nombre'=>['required'],
                'apellido'=>['required'],
                'dni'=>['required','unique:users,dni', 'min:9','regex:/^[XYZxyz]?([0-9]{7,8})([A-Za-z])$/i', 'max:9','unique:empleados,dni','unique:clientes,dni'],
                'telefono'=>['required'],
                'mail'=>['required','unique:users,email','unique:empleados,email','unique:clientes,email']      
            ];
        }
    }

    public function messages(){
        return [
            'nombre.required'=>"El campo nombre es obligatorio",
            'apellido.required'=>"El campo apellido es obligatorio",
            'dni.required'=>"El campo dni es obligatorio",
            'dni.unique'=>"DNI-NIE duplicado",
            'dni.regex'=>"El formato del DNI-NIE no es correcto",
            'telefono.required'=>"El campo telefono es obligatorio",
            'mail.unique'=>"Ya existe ese E-mail en el sistema",
            'mail.required'=>"El campo E-mail es obligatorio"

        ];

    }
}
