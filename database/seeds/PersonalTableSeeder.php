<?php

use Illuminate\Database\Seeder;
use App\Personal;

class PersonalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personal::create([
            'nombre' => 'Carmen',
            'apellido_paterno' => 'Mendoza',
            'apellido_materno' => 'Maldonado',
            'ci' => '8145260',
            'fecha_nacimiento' => '1990-05-30',
            'celular' => '69532155',
            'direccion' => 'Calama',
            'cargo' => 'Administrador',
        ]);

        Personal::create([
            'nombre' => 'Juan Carlos',
            'apellido_paterno' => 'Moreno',
            'apellido_materno' => 'Arias',
            'ci' => '66210012',
            'fecha_nacimiento' => '1988-10-13',
            'celular' => '72646319',
            'direccion' => 'La Paz',
            'cargo' => 'Encargado',
        ]);

        factory(Personal::class, 5)->create();
    }
}
