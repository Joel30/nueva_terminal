<?php

use Faker\Generator as Faker;

$factory->define(App\Empresa::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->company,
        'nro_oficina' => $faker->unique()->randomNumber($nbDigits = 2, $strict = false),
        'telefono' => $faker->phoneNumber,
        'celular' => $faker->randomNumber($nbDigits = 8, $strict = true),
        'responsable' => $faker->name,
    ];
});
