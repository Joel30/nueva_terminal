<?php

use Faker\Generator as Faker;

$factory->define(App\Bus::class, function (Faker $faker) {

    $buses = [
        'Abarth' => ['500 Abarth','Punto Abarth','Spider 124'],
        'Alfa Romeo' => ['Stelvio','Giulia','MiTo','Giulietta','4C'],
        'Alpine' => ['A110'],
        'Aston Martin' => ['DB11','DB9','DBS','Rapide','Vantage'],
        'BMW' => ['x2','x3','i3','i8','X6'],
        'Cadilac' => ['ATS Coupé','CTS','Escalade','SRX'],
        'Chevrolet' => ['Aveo','Camaro Coupé/Cabrio','Corvette C6','Cruze','Trax'],
        'Ferrari' => ['458 Italia','488 GTB','GTC4Lusso','FF','LaFerrari'],
        'Ford' => ['EcoSport','Focus','Fiesta','B-Max','C-MAX/Grand C-MAX'],
        'Honda' => ['Jazz','CR-V','Civic','HR-V','NSX'],
        'Hyundai' => ['Kona','Tucson','Ioniq','i30','i40'],
        'Infiniti' => ['Q50','Q60','Q70','QX50','Q30'],
        'Jaguar' => ['E-Pace','F-Pace','F-Type','XE','XF'],
        'KIA' => ['Stonic',"Pro_Cee'd",'Niro',"Cee'd",'Rio'],
        'Mazda' => ['MX-5','3','6','CX-5','5'],
        'Mercedes-Benz' => ['Clase S','Clase X','Clase C','Clase E','Clase G'],
        'Nissan' => ['Leaf','Qashqai','X-TRAIL','Pulsar','NP300 Navara'],
        'Mitsubishi' => ['Eclipse Cross','ASX','Outlander','L200','Montero'],
        'Suzuki' => ['Swift','Jimny','Ignis','Vitara','SX4 S-Cross'],
        'Volvo' => ['V90','S60','V40','XC60','XC90'],
        'Volkswagen' => ['Polo','Golf','Tiguan','T-Roc','Passat'],
        'Toyota' => ['Rav4','C-hr','Corolla','Land Cruiser','Hilux'],
    ];

    $colores = ['turquesa', 'verde oliva', 'verde mental', 'borgoña', 'lavanda', 'magenta', 'salmón', 'cian', 'beige', 'rosado', 'verde oscuro', 'oliva', 'lila', 'amarillo pálido', 'fucsia', 'mostaza', 'ocre', 'malva', 'púrpura oscuro', 'verde lima', 'verde claro', 'ciruela', 'azul claro', 'melocotón', 'violeta', 'tan', 'granate', 'negro', 'azul', 'marrón', 'gris', 'verde', 'naranja', 'rosa', 'púrpura', 'rojo', 'blanco', 'amarillo'];

    return [
        'empresa_id' => $faker->randomElement($array = App\Empresa::pluck('id')),
        'tipo_bus' => $faker->randomElement($array = array ('Normal','Semicama','Cama','Leito')),
        'placa' => $faker->unique()->ean8,
        'marca' => $marca = $faker->randomElement($array = array_keys($buses)),
        'modelo' => $faker->randomElement($array = $buses[$marca]),
        'color' => $faker->randomElement($array = $colores),
    ];
});
