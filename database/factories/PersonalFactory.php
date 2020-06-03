<?php

use Faker\Generator as Faker;

$factory->define(App\Personal::class, function (Faker $faker) {

    $nombres = ["Martha","Roxana","Ana María","Elizabeth","Sonia","Juana","Patricia","Lidia","Rosmery","Carmen","Laura","Ana Patricia","Lucía","Paula","Silvia","María","Juan Carlos","José Luis","Marco Antonio","Miguel Ángel","Juan","Mario","David","Fernando","Víctor Hugo","Jorge","Hugo","Antonio","Pablo","Mario","José Manuel","Víctor"];

    $apellidos = ["González","Rodríguez","Gómez","Fernández","López","Díaz","Martínez","Pérez","García","Sánchez","Romero","Sosa","Torres","Álvarez","Ruiz","Ramírez","Flores","Benítez","Acosta","Medina","Herrera","Suárez","Aguirre","Giménez","Gutiérrez","Pereyra","Rojas","Molina","Castro","Ortiz","Silva","Núñez","Luna","Juárez","Cabrera","Ríos","Morales","Godoy","Moreno","Ferreyra","Domínguez","Carrizo","Peralta","Castillo","Ledesma","Quiroga","Vega","Vera","Muñoz","Ojeda","Ponce","Villalba","Cardozo","Navarro","Coronel","Vázquez","Ramos","Vargas","Cáceres","Arias","Figueroa","Córdoba","Correa","Maldonado","Paz","Rivero","Miranda","Mansilla","Farias","Roldán","Méndez","Guzmán","Aguero","Hernández","Lucero","Cruz","Páez","Escobar","Mendoza","Barrios","Bustos","Ávila","Ayala","Blanco","Soria","Maidana","Acuña","Leiva","Duarte","Moyano","Campos","Soto","Martín","Valdez","Bravo","Chávez","Velázquez","Olivera","Toledo","Franco"];

    $calles = ['America','Antofagasta','Arce','Arenas','Avenida Argentina','Argote','Armando Olmero','Arrueta','Asuncion','Ayacucho','B.Vargas','Baldomero','Betanzos','Bolivar','Boqueron','Bustillos','C.Lopez','Calama','Calero','Calvimontes','Camacho','Capitan Castrillo','Caracas','Chacon','Charcas','Chayanta','Chuquisaca','Avenida Civica','Cobija','Colombia','Coloradas de Bolivia','Cuzco','D.Almagro','Avenida Del Maestro' ,'Avenida Tinkuy','Donato Dalence','Duran De Castro','E.Daza','Ecuador','F.Gumiel','Fanola','Frias','Gabriel Rene Moreno','Gareca','Gran Poder','Avenida Highland Players','Homandoz','Hoyos','Ingavi','J.Manrique','Juan Antonio Albares de Arenales','Junin','L.Jaimes','La Paz','La Rivera','Lanza','Avenida Las Americas','Linares','Avenida Litoral','Los Ilustres','Avenida Luis Soux','M. Arellano','M.Arujo','M.Garcia','M.J. Calderon','Manquiri','Matos','Medinacelli','Melchor Daza','Millares','Mejillones','Molina','Nicolas Rojas','Nogales','Omiste','Oruro','Avenida P.D. Murrillo','Pacheco','Padilla','Pando','Perez de Holguin','Periodista','Pisagua','Pizarro','Porco','Quijarro','Ramos','Saavedra','Salquero','San Alberto','San Pedro','Sandoval','Avenida Santa Cruz','Serrudo','Avenida Sevilla','Smith','Sucre','Surco','Avenida Tapia','Tarija','Tupiza','Avenida Universitaria','Ustarez','Vanguardia','Vargas','Vasconcelos','Venezuela','Villarroel','Villavalda','Villazon','Wenceslao Alba'];

    return [
        'nombre' => $faker->randomElement($array = $nombres),
        'apellido_materno' => $faker->randomElement($array = $apellidos),
        'apellido_paterno' => $faker->randomElement($array = $apellidos),
        'ci' => $faker->unique()->randomNumber($nbDigits = 7, $strict = true),
        'fecha_nacimiento' => $faker->dateTimeBetween('-60 years', '-20 years'),
        'celular' => $faker->numberBetween($min = 60000000, $max = 79999999),
        'direccion' => $faker->randomElement($calles),
        'cargo' => $faker->randomElement($array = array ('Administrador','Encargado')),
    ];
});
