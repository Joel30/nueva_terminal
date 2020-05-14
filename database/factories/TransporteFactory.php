<?php

use Faker\Generator as Faker;

$factory->define(App\Transporte::class, function (Faker $faker) {
    return [
        'departamento_id'  => $faker->randomElement($array = App\Departamento::pluck('id')),
        'carril_id' => $faker->randomElement($array = App\Carril::pluck('id')),
        'bus_id' => $faker->unique()->randomElement($array = App\Bus::pluck('id')),

        'hora' => $faker->randomElement($array = array ('10:30','08:30','12:30', '15:00', '16:30', '20:00', '22:00')),
        'estado' => $faker->randomElement($array = array ('Activo','Cancelado')),
    ];
});
