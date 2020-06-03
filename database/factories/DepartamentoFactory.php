<?php

use Faker\Generator as Faker;

$factory->define(App\Departamento::class, function (Faker $faker) {
    $destino = [
        "La Paz",
        "Cochabamba",
        "Oruro",
        "Sucre",
        "Tarija",
        "Camargo",
        "Tupiza",
        "Villazon",
        "Argentina",
        "Chile",
    ];

    $internacional = [
        "Argentina",
        "Chile",
    ];

    return [
        'destino' => $a = $faker->unique()->randomElement($array = $destino), //town  
        'tipo' => in_array($a, $internacional)? 'Internacional' : 'nacional'
    ];

});
