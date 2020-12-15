<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yumazine',
            'email' => 'yumazine@gmail.com',
            'password' => bcrypt('asd'),
            'admin' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Polorax',
            'email' => 'polorax@gmail.com',
            'password' => bcrypt('asd'),
            'admin' => 0
        ]);
    }
}
