<?php

use Faker\Generator as Faker;

$factory->define(App\Empresa::class, function (Faker $faker) {

    $empresa_transporte = [
        "Autobuses Quirquincho",
        "Balut HNOS. S.R.L",
        "Linea de Transportes Illimani",
        "Trans Relampago",
        "Trans Copacabana S.A.",
        "Trans Imperial Potosi",
        "Linea Sindical Flota Bolivar",
        "Transporte Crucero",
        "Trans Galeon",
        "Flota Cosmos",
        "Linea Sindical Trans Universo",
        "Flota Copacabana",
        "Expreso Cochabamba",
        "Transporte El Dorado",
        "Flota Sindical Imperial Potosi",
        "Linea Sindical Flota Cosmos",
        "Flota Unificado",
        "Sindicato de Omnibuses Bustillos",
        "Linea Sindical Flota Copacabana",
        "Linea Sindical Expreso Copacabana",
        "Trans Andorinha San Miguel",
        "Trans Azul",
        "Trans San Jose",
        "Flota Challapata",
        "Trans Emprerador",
        "Auto Transportes Tupiza",
        "Trans Alonzo de Ibañes",
        "Transtin Dirley",
        "Trans Villa Imperial",
        "Sindicato 6 de Octubre",
        "Trans Real Audiencia",
        "Expreso Tarija",
        "Auto Transportes Sama",
        "Tour Villa Imperial",
        "Trans Linares",
        "Flota Boqueron",
        "Trans Turismo Mundo",
        "Trans Norte",
        "A.T.L Villazon",
        "Trans Panemericano",
        "Trans O Globo",
        "Chicheño Buss",
        "Flota Diamante",
    ];

    $nombres = ["Martha","Roxana","Ana María","Elizabeth","Sonia","Juana","Patricia","Lidia","Rosmery","Carmen","Laura","Ana Patricia","Lucía","Paula","Silvia","María","Juan Carlos","José Luis","Marco Antonio","Miguel Ángel","Juan","Mario","David","Fernando","Víctor Hugo","Jorge","Hugo","Antonio","Pablo","Mario","José Manuel","Víctor"];

    $apellidos = ["González","Rodríguez","Gómez","Fernández","López","Díaz","Martínez","Pérez","García","Sánchez","Romero","Sosa","Torres","Álvarez","Ruiz","Ramírez","Flores","Benítez","Acosta","Medina","Herrera","Suárez","Aguirre","Giménez","Gutiérrez","Pereyra","Rojas","Molina","Castro","Ortiz","Silva","Núñez","Luna","Juárez","Cabrera","Ríos","Morales","Godoy","Moreno","Ferreyra","Domínguez","Carrizo","Peralta","Castillo","Ledesma","Quiroga","Vega","Vera","Muñoz","Ojeda","Ponce","Villalba","Cardozo","Navarro","Coronel","Vázquez","Ramos","Vargas","Cáceres","Arias","Figueroa","Córdoba","Correa","Maldonado","Paz","Rivero","Miranda","Mansilla","Farias","Roldán","Méndez","Guzmán","Aguero","Hernández","Lucero","Cruz","Páez","Escobar","Mendoza","Barrios","Bustos","Ávila","Ayala","Blanco","Soria","Maidana","Acuña","Leiva","Duarte","Moyano","Campos","Soto","Martín","Valdez","Bravo","Chávez","Velázquez","Olivera","Toledo","Franco"];

    return [
        'nombre' => $faker->unique()->randomElement($array = $empresa_transporte),
        'nro_oficina' => $faker->unique()->randomNumber($nbDigits = 2, $strict = false),
        'telefono' => ($faker->numberBetween($min = 20, $max = 99)).'-'.($faker->numberBetween($min = 10000, $max = 99999)),
        'celular' => $faker->numberBetween($min = 60000000, $max = 79999999),
        'responsable' => $faker->randomElement($array = $nombres).' '.$faker->randomElement($array = $apellidos).' '.$faker->randomElement($array = $apellidos),
    ];
});
