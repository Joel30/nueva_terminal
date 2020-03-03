<?php

use Faker\Generator as Faker;

$factory->define(App\TrasportList::class, function (Faker $faker) {
    return [
        'departamento_id'  => str_random(10),
        'empresa_transporte_id' => str_random(10),
        'carril_id' => str_random(10),
        'bus_id' => str_random(10),
        'fecha_salida' => $faker->date,
        'hora_salida' => $faker->time,
        'fecha_llegada' => $faker->date,
        'hora_llegada' => $faker->time,
        'estado' => str_random(10),
        'departamento_id' => str_random(10),
    ];
});
