<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empleado;
use App\Cliente;
class Orden extends Model
{
    protected $fillable = ['cliente_id', 'empleado_id', 'pvp', 'marcaEquipo', 'modeloEquipo', 'descripcionFallo'];
    //
    public function empleado(){
        return $this->belongsTo('App\Empleado','empleado_id')
        ->withTimestamps()
        ->withPivot('nombre', 'apellido');
     }

     public static function nombreCliente($id){
        $cliente=Cliente::find($id);
        $nombre=$cliente->nombre;
        $apellido=$cliente->apellido;
        return "$nombre, $apellido";
    }

    public static function nombreEmpleado($id){
        $empleado=Empleado::find($id);
        $nombre=$empleado->nombre;
        $apellido=$empleado->apellido;
        return "$nombre, $apellido";
    }

    public function scopeEstado($query, $v){
        if(!isset($v)){
           return $query;
        }
        if(isset($v)){
            return $query->where('estadoOrden', 'like', $v);
        }
    }
    public function scopeSerial($query, $v){
        if(!isset($v)){
           return $query;
        }
        if($v=='%'){
            return $query;
        }
        if(isset($v)){
            return $query->where('serialOrden', 'like', $v);
        }
    }

    public function scopeEmpleado($query, $v){
        if(!isset($v)){
           return $query;
        }
        if($v=='%'){
            return $query;
        }
        if(isset($v)){
            return $query->where('empleado_id', 'like', $v);
        }
    }


}
