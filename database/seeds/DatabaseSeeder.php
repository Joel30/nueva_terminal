<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTable([
            'staff',
            'users',
            'departments',
            'transport_lists',
            'transport_companies',
            'buses',
            'lanes',
        ]);

        $this->call(StaffTableSeeder::class);
        //$this->call(UsersTableSeeder::class);

        $this->call(LanesTableSeeder::class);
        $this->call(BusesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(TransportCompaniesTableSeeder::class);
        //$this->call(TransportListTableSeeder::class);
    }

    protected function truncateTable(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
    }
}
