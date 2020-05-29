<?php

use Illuminate\Database\Seeder;
use App\Transporte;

class TransportesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transporte::class, 5)->create();
    }
}