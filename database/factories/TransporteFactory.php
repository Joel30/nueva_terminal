<?php

use Faker\Generator as Faker;

$factory->define(App\Transporte::class, function (Faker $faker) {
    return [
        'departamento_id'  => $faker->randomElement($array = App\Departamento::pluck('id')),
        'empresa_id' => $faker->randomElement($array = App\Empresa::pluck('id')),
        'carril_id' => $faker->randomElement($array = App\Carril::pluck('id')),
        'bus_id' => $faker->randomElement($array = App\Bus::pluck('id')),
    ];
});
