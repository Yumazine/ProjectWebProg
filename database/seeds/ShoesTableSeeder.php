<?php

use Illuminate\Database\Seeder;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->insert([
            'name' => 'Nike Air Max',
            'description' => '',
            'price' => 1619999,
            'image' => '1.png'
        ]);
        DB::table('shoes')->insert([
            'name' => 'Nike Air Max+ 2013 "Volt"',
            'description' => '',
            'price' => 2549999,
            'image' => '2.png'
        ]);
        DB::table('shoes')->insert([
            'name' => 'Nike Air Max 270 "total Orange"',
            'description' => '',
            'price' => 1449999,
            'image' => '3.png'
        ]);
        DB::table('shoes')->insert([
            'name' => 'Nike Presto Extreme Girl',
            'description' => '',
            'price' => 979999,
            'image' => '4.png'
        ]);
        DB::table('shoes')->insert([
            'name' => 'Nike Kyrie 5 Oreo',
            'description' => '',
            'price' => 2719999,
            'image' => '5.png'
        ]);
        DB::table('shoes')->insert([
            'name' => 'Nike Air Max Sneakers',
            'description' => '',
            'price' => 1979999,
            'image' => '6.png'
        ]);
    }
}
