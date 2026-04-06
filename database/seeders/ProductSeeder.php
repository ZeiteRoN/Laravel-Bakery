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
            'image_path' => 'storage/products/placeholder.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Cookie',
            'description' => 'This is very delicious cookie',
            'category_id' => 2,
            'image_path' => 'storage/products/placeholder.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Cheesecake',
            'description' => 'This is very delicious cheesecake',
            'category_id' => 3,
            'image_path' => 'storage/products/placeholder.jpg',
        ]);
    }
}
