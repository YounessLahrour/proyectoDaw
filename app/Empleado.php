<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
class Empleado extends Model
{
    //
    protected $fillable=['nombre', 'apellido', 'direccion', 'telefono', 'mail', 'foto'];
    
    public function clientes()
    {
        return $this->belongsToMany('App\Cliente')
        ->withTimestamps()
        ->withPivot('id','serialOrden', 'empleado_id', 'cliente_id');
    }
    
}
