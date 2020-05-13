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
        'empleado_id'=>rand(1, 25),
        'serialOrden'=>time(),
        'marcaEquipo'=>$marca[rand(1, count($marca)-1)],
        'modeloEquipo'=>$modelo[rand(1, count($modelo)-1)],
        'descripcionFallo'=>$fallo[rand(0, count($fallo)-1)]    
    ];
});
