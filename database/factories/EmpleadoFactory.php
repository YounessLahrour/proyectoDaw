<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use Faker\Factory;
$faker=Factory::create('es_ES');

$factory->define(Empleado::class, function ($faker) {
    $provincias=["Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", "Badajoz", "Barcelona", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ciudad Real", "Córdoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipúzcoa", "Huelva", "Huesca", "Islas Baleares", "Jaén", "La Coruña", "La Rioja", "Las Palmas", "León", "Lérida", "Lugo", "Madrid", "Málaga", "Murcia", "Navarra", "Orense", "Palencia", "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza"];
    $estado=["Alta", "Baja"];
    return [
        'nombre'=>$faker->firstName($gender='male'| 'female'),
        'apellido'=>$faker->lastName(),
        'dni'=>$faker->unique()->ean8,
        'direccion'=>$faker->address,
        'provincia'=>$provincias[rand(1, count($provincias)-1)],
        'estadoEmpleo'=>$estado[rand(0, count($estado)-1)],
        'telefono'=>$faker->e164PhoneNumber,
        'fechaNacimiento'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'email'=>$faker->unique()->safeEmail     
    ];
});
