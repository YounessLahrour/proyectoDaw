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
            'dni'=>['required','min:9','regex:/^[XYZxyz]?([0-9]{7,8})([A-Za-z])$/i', 'max:9', 'unique:clientes,dni','unique:empleados,dni,'.$this->empleado->id],
            'provincia'=>['required'],
            'estadoEmpleo'=>['required'],
            'fechaNacimiento'=>['required'],
            'direccion'=>['required'],
            'telefono'=>['required'],
            'mail'=>['required','unique:clientes,email','unique:empleados,email,'.$this->empleado->id],
            'foto'=>['nullable','image']  
        ];
        }else{
            return [
                'nombre'=>['required'],
                'apellido'=>['required'],
                'dni'=>['required', 'min:9','regex:/^[XYZxyz]?([0-9]{7,8})([A-Za-z])$/i', 'max:9','unique:users,dni','unique:empleados,dni','unique:clientes,dni'],
                
                'provincia'=>['required'],
                'estadoEmpleo'=>['required'],
                'fechaNacimiento'=>['required'],
                'direccion'=>['required'],
                'telefono'=>['required'],
                'mail'=>['required','unique:empleados,email','unique:clientes,email'],
                'foto'=>['nullable','image']       
            ];
        }
    }

    public function messages(){
        return [
            'nombre.required'=>"El campo nombre es obligatorio",
            'apellido.required'=>"El campo apellido es obligatorio",
            'dni.required'=>"El campo dni es obligatorio",
            'dni.regex'=>"El formato del DNI-NIE no es correcto",
            'provincia.required'=>"El campo provincia es obligatorio",
            'estadoEmpleo.required'=>"El campo Alta/Baja es obligatorio",
            'direccion.required'=>"El campo direccion es obligatorio",
            'telefono.required'=>"El campo telefono es obligatorio",
            'mail.unique'=>"Ya existe ese E-mail en el sistema",
            'mail.required'=>"El campo E-mail es obligatorio"
        ];

    }
}
