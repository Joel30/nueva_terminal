<?php

use Illuminate\Database\Seeder;
use App\Viaje;

class ViajesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Viaje::class, 10)->create();
    }
}
        
