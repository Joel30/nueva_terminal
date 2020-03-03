<?php

use Faker\Generator as Faker;

$factory->define(App\TransportCompany::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'nro_oficina' => $faker->randomNumber($nbDigits = 2, $strict = false),
        'telefono' => $faker->phoneNumber,
        'celular' => $faker->randomNumber($nbDigits = 8, $strict = true),
        'responsable' => $faker->name,
    ];
});
