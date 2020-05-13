<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenRequest extends FormRequest
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
            'empleado'=>['required'],
            'cliente'=>['required'],
            'estado'=>['required'],
            'marcaEquipo'=>['required'],
            'modeloEquipo'=>['required'],
            'descripcionFallo'=>['required'],
            'pvp'=>['required'] 
        ];
        }else{
            return [
            'empleado'=>['required'],
            'cliente'=>['required'],
            'estado'=>['required'],
            'marcaEquipo'=>['required'],
            'modeloEquipo'=>['required'],
            'descripcionFallo'=>['required'],
            'pvp'=>['required']       
            ];
        }
    }

    public function messages(){
        return [
            'empleado.required'=>"El campo empleado es obligatorio",
            'cliente.required'=>"El campo cliente es obligatorio",
            'estado.required'=>"El campo estado es obligatorio",
            'marcaEquipo.required'=>"El campo marca es obligatorio",
            'modeloEquipo.required'=>"El campo modelo es obligatorio",
            'descripcionFallo.required'=>"El campo descripcion es obligatorio",
            'pvp.required'=>"El campo precio es obligatorio"
        ];

    }
}
