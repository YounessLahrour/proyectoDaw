<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empleado;
class Cliente extends Model
{
    //
    public function empleados()
    {
        return $this->belongsToMany('App\Empleado')
        ->withTimestamps()
        ->withPivot('id','serialOrden', 'empleado_id', 'cliente_id');
    }

    public static function nombreCliente($id){
        $cliente=Cliente::find($id);
        $nombre=$cliente->nombre;
        $apellido=$cliente->apellido;
        return "$nombre, $apellido";
    }

    public function scopeDni($query, $v){
        if(!isset($v)){
           return $query;
        }
        if($v=='%'){
            return $query;
        }
        if(isset($v)){
            return $query->where('dni', 'like', $v);
        }
    }
}
