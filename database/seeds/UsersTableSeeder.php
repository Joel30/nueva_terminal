<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'personal_id' => App\Personal::select('id')->where('cargo', 'Administrador')->first()->id,
        ]);

        User::create([
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'personal_id' => App\Personal::select('id')->where('cargo', 'Encargado')->first()->id,
        ]);
    }
}
