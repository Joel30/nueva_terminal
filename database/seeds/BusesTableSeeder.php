<?php

use Illuminate\Database\Seeder;
use App\Bus;
class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bus::class, 10)->create();
    }
}
