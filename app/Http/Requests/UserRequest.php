<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name'=>ucwords($this->nombre),
                'apellido'=>ucwords($this->apellido)
                
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
      
            return [
                'name' => ['required', 'string', 'max:255'],
                'apellido' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users','unique:empleados','unique:clientes'.$this->usuario->id],
                'foto' => ['nullable'] 
        ];
        
    }

    /*public function messages(){
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

    }*/
}
