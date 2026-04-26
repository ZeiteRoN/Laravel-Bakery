<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Bread',
            'White Bread',
            'Whole Grain Bread',
            'Baguettes',
            'Croissants',
            'Buns',
            'Sweet Buns',
            'Donuts',
            'Bagels',
            'Toast Bread',
            'Ciabatta',
            'Sourdough Bread',

            'Cakes',
            'Birthday Cakes',
            'Wedding Cakes',
            'Chocolate Cakes',
            'Cheesecakes',
            'Cupcakes',
            'Muffins',
            'Brownies',
            'Cookies',
            'Macarons',
            'Tarts',
            'Pies',

            'Pastries',
            'Danish Pastries',
            'Eclairs',
            'Strudels',
            'Cannoli',

            'Desserts',
            'Puddings',
            'Ice Cream Cakes',
            'Fruit Desserts',

            'Breakfast',
            'Sandwiches',
            'Toast Sets',

            'Drinks',
            'Coffee',
            'Tea',
            'Hot Chocolate',
            'Fresh Juice',

            'Seasonal Specials',
            'Christmas Bakery',
            'Easter Bakery',
            'Valentine Specials',

            'Vegan Products',
            'Gluten Free',
            'Sugar Free',

            'Snacks',
            'Pretzels',
            'Crackers',

            'Gift Boxes',
            'Party Sets',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
