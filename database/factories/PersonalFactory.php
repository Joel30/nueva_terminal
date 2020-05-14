<?php

use Faker\Generator as Faker;

$factory->define(App\Personal::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido_materno' => $faker->lastName,
        'apellido_paterno' => $faker->lastName,
        'ci' => $faker->unique()->randomNumber($nbDigits = 7, $strict = true),
        'fecha_nacimiento' => $faker->date,
        'celular' => $faker->randomNumber($nbDigits = 8, $strict = true),
        'direccion' => $faker->streetAddress,
        'cargo' => $faker->randomElement($array = array ('Administrador','Encargado')),
    ];
});
