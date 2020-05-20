<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Orden;

class Empleado extends Model
{
    //
    protected $fillable = ['nombre', 'apellido', 'direccion', 'telefono', 'mail', 'foto'];

    public function clientes()
    {
        return $this->belongsToMany('App\Cliente')
            ->withTimestamps()
            ->withPivot('id', 'serialOrden', 'empleado_id', 'cliente_id');
    }

    public function ordenes()
    {
        $ordenes = Orden::where('empleado_id', 'like', $this->id)
            ->where('estadoOrden', 'like', 'Pendiente')
            ->orWhere('estadoOrden', 'like', 'Abierta')
            ->count();
        return $ordenes;
    }

    public function cliente($id){
        $cliente=Cliente::find($id);
        return $cliente;
    }

    public function ordenesCerradas()
    {
        $ordenes = Orden::where('empleado_id', 'like', $this->id)
            ->where('estadoOrden', 'like', 'Cerrada');
            //->count();
        return $ordenes;
    }
    public function ordenesIngresos()
    {
        $ordenes = Orden::where('empleado_id', 'like', $this->id)
            ->where('estadoOrden', 'like', 'Cerrada')
            ->get();
        return $ordenes;
    }

    public function ingresos(){
        $ingresos=0;
        foreach ($this->ordenesIngresos() as $orden) {
            $ingresos += $orden->pvp;
        }
        return $ingresos;
    }

    public function scopeFiltro($query, $v)
    {

        if (!isset($v)) {
            return $query;
        }
        if ($v == '%') {
            return $query;
        }
        if ($v == '1') {
            $empleados = Empleado::all();
            $empleado = Empleado::find(1);
            $id=0;
            
            foreach ($empleados as $item) {
                //dd($empleado->ordenesCerradas());
                if ($item->ordenesCerradas()->count() >= $empleado->ordenesCerradas()->count()) {
                    $id = $item->id;
                   
                    $empleado = $item;
                    //dd($empleado);
                }
                // dd($item);
            }
            return $query->where('id', 'like', $id);
        }
        if ($v == '2') {
            $empleados = Empleado::all();
            $empleado = Empleado::find(1);
            $id=0;
            foreach ($empleados as $item) {
                if ($item->ordenesCerradas()->count() <= $empleado->ordenesCerradas()->count()) {
                    $id = $item->id;
                    $empleado = $item;
                }
                // dd($item);
            }
            return $query->where('id', 'like', $id);
        }

        if ($v = '3') {
            $empleados = Empleado::all();
            $id;
            $ventaA = 0;
            $ventaN = 0;
            foreach ($empleados as $empleado) {

                foreach ($empleado->ordenesIngresos() as $orden) {
                    $ventaN += $orden->pvp;
                }
                if ($ventaN >= $ventaA) {
                    $ventaA = $ventaN;
                    $id = $empleado->id;
                }
                $ventaN = 0;
            }
            return $query->where('id', 'like', $id);
        }   
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
