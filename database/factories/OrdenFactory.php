<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Orden;
use Faker\Factory;
$faker=Factory::create('es_ES');

$factory->define(Orden::class, function ($faker) {
    $modelo=["GS-94531","RE952D","65416GR"," NP-65214", "GL62S21","HP-93162"];
    $fallo=["Cambiar pantalla", "No enciede", "Cambiar micrófono", "copia de seguridad",
    "Formatear", "cambiar batería"];
    $marca=["Samsung", "HP", "Sony", "Acer","Lenovo","LG", "Alcatel","Huawei","Xiaomi"];
    return [
        'cliente_id'=>rand(1, 25),
        'empleado_id'=>rand(1, 4),
        'serialOrden'=>generarCodigo(8),
        'pvp'=>rand(50, 300),
        'marcaEquipo'=>$marca[rand(1, count($marca)-1)],
        'modeloEquipo'=>$modelo[rand(1, count($modelo)-1)],
        'descripcionFallo'=>$fallo[rand(0, count($fallo)-1)]    
    ];
});

function generarCodigo($longitud) {
    $key = '';
    $pattern =strtoupper('1234567890abcdefghijklmnopqrstuvwxyz') ;
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}
