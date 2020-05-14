<?php

use Faker\Generator as Faker;

$factory->define(App\Carril::class, function (Faker $faker) {
    return [
        'carril' => $faker->unique()->randomNumber($nbDigits = 2, $strict = false),
        'anden'=> $faker->randomElement($array = array ('A','B','C')),
    ];
});
