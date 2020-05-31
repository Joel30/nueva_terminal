<?php

use Faker\Generator as Faker;

$factory->define(App\Viaje::class, function (Faker $faker) {
    $transporte_id = $faker->randomElement($array = App\Transporte::pluck('id'));
    $t = App\Transporte::find($transporte_id);
    $departamento = json_decode($t->departamento);
    $empresa = json_decode($t->bus->empresa);
    $carril = json_decode($t->carril);
    $bus = json_decode($t->bus);
    return [
        'transporte_id' => $transporte_id,
        'departamento' => $departamento,
        'empresa' => $empresa,
        'carril' => $carril,
        'bus' => $bus,
        'fecha' => $faker->dateTimeBetween('-2 days', 'now'),
        'hora' => $faker->randomElement($array = array ('10:30','08:30','12:30', '15:00', '16:30', '20:00', '22:00')),
        'estado' => $faker->randomElement($array = array ('a_tiempo','retrasado','cancelado', 'llegado')),        'llegada_salida' => $faker->randomElement($array = array ('llegada','salida')),
    ];
});
