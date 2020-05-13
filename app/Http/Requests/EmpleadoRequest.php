<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if($this->method()=='PUT'){
            return [
            'nombre'=>['required'],
            'apellido'=>['required'],
            'dni'=>['required'],
            'provincia'=>['required'],
            'estadoEmpleo'=>['required'],
            'fechaNacimiento'=>['required'],
            'direccion'=>['required'],
            'telefono'=>['required'],
            'mail'=>['required','unique:empleados,mail,'.$this->empleado->id],
            'foto'=>['nullable','image']  
        ];
        }else{
            return [
                'nombre'=>['required'],
                'apellido'=>['required'],
                'dni'=>['required'],
                'provincia'=>['required'],
                'estadoEmpleo'=>['required'],
                'fechaNacimiento'=>['required'],
                'direccion'=>['required'],
                'telefono'=>['required'],
                'mail'=>['required','unique:empleados,mail'],
                'foto'=>['nullable','image']       
            ];
        }
    }

    public function messages(){
        return [
            'nombre.required'=>"El campo nombre es obligatorio",
            'apellido.required'=>"El campo apellido es obligatorio",
            'dni.required'=>"El campo dni es obligatorio",
            'provincia.required'=>"El campo provincia es obligatorio",
            'estadoEmpleo.required'=>"El campo Alta/Baja es obligatorio",
            'direccion.required'=>"El campo direccion es obligatorio",
            'telefono.required'=>"El campo telefono es obligatorio",
            'mail.unique'=>"Ya existe ese E-mail en el sistema",
            'mail.required'=>"El campo E-mail es obligatorio"
        ];

    }
}
