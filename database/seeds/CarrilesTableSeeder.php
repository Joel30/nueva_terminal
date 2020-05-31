<?php

use Illuminate\Database\Seeder;
use App\Carril;

class CarrilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Carril::class, 20)->create();
    }
}
