<?php

use Illuminate\Database\Seeder;
use App\Lane;

class LanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lane::class, 10)->create();
    }
}
