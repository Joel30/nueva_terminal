<?php

use Illuminate\Database\Seeder;
use App\TransportCompany;

class TransportCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TransportCompany::class, 5)->create();

    }
}
