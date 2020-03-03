<?php

use Faker\Generator as Faker;

$factory->define(App\Lane::class, function (Faker $faker) {
    return [
        'carril' => $faker->randomNumber($nbDigits = 2, $strict = false),
        'anden'=> $faker->randomElement($array = array ('A','B','C')),
    ];
});
