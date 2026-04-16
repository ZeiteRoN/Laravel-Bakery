<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Pie',
            'description' => 'This is very delicious pie',
            'category_id' => 1,
            'price' => 100,
            'weight' => 2,
            'height' => 0.5,
            'stock' => 2
        ]);
        DB::table('products')->insert([
            'name' => 'Cookie',
            'description' => 'This is very delicious cookie',
            'category_id' => 2,
            'price' => 200,
            'weight' => 2,
            'height' => 0.5,
            'stock' => 2
        ]);
        DB::table('products')->insert([
            'name' => 'Cheesecake',
            'description' => 'This is very delicious cheesecake',
            'category_id' => 3,
            'price' => 300,
            'weight' => 2,
            'height' => 0.5,
            'stock' => 2
        ]);
    }
}
