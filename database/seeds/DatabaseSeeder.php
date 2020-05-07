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
            'personal',
            'users',
            'departamentos',
            'transportes',
            'empresas',
            'buses',
            'carriles',
        ]);

        $this->call(PersonalTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(CarrilesTableSeeder::class);
        $this->call(BusesTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(TransportesTableSeeder::class);
    }

    protected function truncateTable(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
    }
}
