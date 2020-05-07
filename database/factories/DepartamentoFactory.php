<?php

use Faker\Generator as Faker;

$factory->define(App\Departamento::class, function (Faker $faker) {
    return [
        'destino' => $faker->city, //town  
        'tipo' => $faker->randomElement($array = array ('Nacional','Internacional')),
    ];
});
