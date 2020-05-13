<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Factory;
$faker=Factory::create('es_ES');

$factory->define(Cliente::class, function ( $faker) {
    return [
        //
        'nombre'=>$faker->firstName($gender='male'| 'female'),
        'apellido'=>$faker->lastName(),
        'dni'=>$faker->unique()->ean8,
        'telefono'=>$faker->e164PhoneNumber,
        'mail'=>$faker->unique()->safeEmail
    ];
});
