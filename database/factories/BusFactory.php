<?php

use Faker\Generator as Faker;

$factory->define(App\Bus::class, function (Faker $faker) {
    return [
        'empresa_id' => $faker->randomElement($array = App\Empresa::pluck('id')),
        'tipo_bus' => $faker->randomElement($array = array ('Normal','Semicama','Cama','Leito')),
        'placa' => $faker->ean8,
        'modelo' => $faker->word,
        'color' => $faker->colorName,
    ];
});
