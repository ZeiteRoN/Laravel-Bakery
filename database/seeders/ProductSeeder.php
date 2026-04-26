<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['French Baguette', 'Classic crispy baguette.', 45, 0.30, 35],
            ['Butter Croissant', 'Fresh buttery croissant.', 38, 0.12, 8],
            ['Chocolate Croissant', 'Croissant with chocolate filling.', 42, 0.14, 8],
            ['Whole Grain Bread', 'Healthy whole grain loaf.', 52, 0.60, 14],
            ['White Bread', 'Soft traditional bread.', 39, 0.55, 13],
            ['Ciabatta', 'Italian style bread.', 48, 0.45, 10],
            ['Sourdough Bread', 'Natural fermented bread.', 58, 0.70, 16],
            ['Bagel Classic', 'Soft bagel.', 25, 0.11, 6],
            ['Sesame Bagel', 'Bagel with sesame.', 27, 0.12, 6],
            ['Cinnamon Roll', 'Sweet cinnamon pastry.', 44, 0.16, 7],

            ['Vanilla Muffin', 'Soft vanilla muffin.', 32, 0.13, 7],
            ['Blueberry Muffin', 'Muffin with blueberries.', 36, 0.14, 7],
            ['Chocolate Muffin', 'Chocolate rich muffin.', 38, 0.14, 7],
            ['Donut Sugar', 'Sugar glazed donut.', 30, 0.12, 6],
            ['Donut Chocolate', 'Chocolate donut.', 34, 0.13, 6],
            ['Pretzel Salted', 'German salted pretzel.', 29, 0.15, 8],
            ['Pretzel Cheese', 'Pretzel with cheese.', 35, 0.17, 8],
            ['Apple Pie Slice', 'Fresh apple pie slice.', 49, 0.18, 5],
            ['Cherry Pie Slice', 'Cherry pie slice.', 52, 0.18, 5],
            ['Pumpkin Pie Slice', 'Seasonal pumpkin pie.', 54, 0.18, 5],

            ['Cheesecake Classic', 'Creamy cheesecake.', 75, 0.20, 6],
            ['Strawberry Cheesecake', 'Cheesecake with strawberries.', 82, 0.22, 6],
            ['Chocolate Cake Slice', 'Chocolate layered cake.', 68, 0.19, 8],
            ['Red Velvet Slice', 'Red velvet cake slice.', 72, 0.20, 8],
            ['Carrot Cake Slice', 'Moist carrot cake.', 64, 0.19, 8],
            ['Brownie Classic', 'Chocolate brownie.', 41, 0.11, 4],
            ['Walnut Brownie', 'Brownie with walnuts.', 45, 0.12, 4],
            ['Macaron Vanilla', 'French macaron.', 26, 0.03, 3],
            ['Macaron Pistachio', 'Pistachio macaron.', 28, 0.03, 3],
            ['Macaron Raspberry', 'Raspberry macaron.', 28, 0.03, 3],

            ['Cookie Chocolate Chip', 'Classic cookie.', 24, 0.08, 2],
            ['Cookie Oatmeal', 'Healthy oatmeal cookie.', 22, 0.08, 2],
            ['Cookie Peanut', 'Peanut cookie.', 25, 0.08, 2],
            ['Eclair Vanilla', 'Vanilla eclair.', 46, 0.15, 5],
            ['Eclair Chocolate', 'Chocolate eclair.', 48, 0.15, 5],
            ['Strudel Apple', 'Apple strudel.', 57, 0.21, 6],
            ['Strudel Cherry', 'Cherry strudel.', 59, 0.21, 6],
            ['Cannoli Ricotta', 'Italian cannoli.', 53, 0.12, 5],
            ['Cupcake Vanilla', 'Vanilla cupcake.', 33, 0.10, 6],
            ['Cupcake Chocolate', 'Chocolate cupcake.', 35, 0.10, 6],

            ['Cupcake Strawberry', 'Berry cupcake.', 36, 0.10, 6],
            ['Wedding Cake Small', 'Elegant wedding cake.', 850, 2.5, 25],
            ['Birthday Cake Chocolate', 'Birthday chocolate cake.', 620, 1.8, 18],
            ['Birthday Cake Vanilla', 'Birthday vanilla cake.', 590, 1.8, 18],
            ['Fruit Tart', 'Fresh fruit tart.', 78, 0.20, 4],
            ['Lemon Tart', 'Tangy lemon tart.', 74, 0.20, 4],
            ['Pudding Vanilla', 'Soft vanilla pudding.', 39, 0.18, 6],
            ['Chocolate Pudding', 'Chocolate pudding.', 42, 0.18, 6],
            ['Granola Bar', 'Healthy snack bar.', 27, 0.06, 2],
            ['Cracker Cheese', 'Crunchy cheese crackers.', 31, 0.09, 2],

            ['Cracker Salted', 'Salted crackers.', 29, 0.09, 2],
            ['Sandwich Ham', 'Ham sandwich.', 64, 0.25, 7],
            ['Sandwich Chicken', 'Chicken sandwich.', 68, 0.27, 7],
            ['Sandwich Veggie', 'Vegetable sandwich.', 59, 0.24, 7],
            ['Toast Set Classic', 'Toast breakfast set.', 82, 0.32, 6],
            ['Toast Set Premium', 'Premium breakfast set.', 99, 0.35, 6],
            ['Espresso', 'Strong coffee shot.', 28, 0.05, 6],
            ['Americano', 'Black coffee.', 34, 0.25, 10],
            ['Cappuccino', 'Milk coffee.', 46, 0.30, 10],
            ['Latte', 'Smooth latte.', 49, 0.35, 12],

            ['Mocha', 'Chocolate coffee.', 52, 0.35, 12],
            ['Flat White', 'Flat white coffee.', 47, 0.28, 10],
            ['Hot Chocolate', 'Rich hot chocolate.', 44, 0.30, 10],
            ['Green Tea', 'Fresh tea.', 26, 0.25, 10],
            ['Black Tea', 'Classic black tea.', 24, 0.25, 10],
            ['Orange Juice', 'Fresh orange juice.', 39, 0.30, 12],
            ['Apple Juice', 'Fresh apple juice.', 37, 0.30, 12],
            ['Croissant Almond', 'Croissant with almonds.', 45, 0.15, 8],
            ['Croissant Strawberry', 'Berry croissant.', 44, 0.15, 8],
            ['Croissant Pistachio', 'Pistachio croissant.', 47, 0.15, 8],

            ['Bun Raisin', 'Sweet raisin bun.', 29, 0.11, 6],
            ['Bun Vanilla', 'Vanilla sweet bun.', 28, 0.11, 6],
            ['Bun Chocolate', 'Chocolate bun.', 31, 0.11, 6],
            ['Toast Bread', 'Perfect for toast.', 43, 0.50, 13],
            ['Garlic Bread', 'Bread with garlic.', 48, 0.45, 12],
            ['Mini Pizza Bread', 'Pizza style bread.', 56, 0.28, 5],
            ['Vegan Brownie', 'Plant based brownie.', 46, 0.11, 4],
            ['Gluten Free Bread', 'No gluten loaf.', 69, 0.52, 13],
            ['Sugar Free Cookie', 'Sugar free cookie.', 28, 0.08, 2],
            ['Vegan Muffin', 'Vegan muffin.', 39, 0.13, 7],

            ['Holiday Cookie Box', 'Gift cookie box.', 210, 0.80, 10],
            ['Macaron Gift Box', 'Gift macarons.', 260, 0.60, 8],
            ['Party Dessert Set', 'Party sweets box.', 390, 1.50, 15],
            ['Christmas Stollen', 'Traditional Christmas bread.', 145, 0.75, 18],
            ['Easter Kulich', 'Sweet Easter bread.', 135, 0.70, 20],
            ['Valentine Cake Mini', 'Romantic mini cake.', 180, 0.55, 10],
            ['Berry Smoothie', 'Mixed berry smoothie.', 55, 0.35, 14],
            ['Banana Smoothie', 'Banana smoothie.', 52, 0.35, 14],
            ['Protein Cookie', 'High protein cookie.', 35, 0.09, 2],
            ['Energy Muffin', 'Healthy energy muffin.', 42, 0.14, 7],
        ];

        $categories = Category::pluck('id')->toArray();

        foreach ($products as $product) {
            Product::create([
                'name' => $product[0],
                'description' => $product[1],
                'price' => $product[2],
                'weight' => $product[3],
                'height' => $product[4],
                'category_id' => $categories[array_rand($categories)],
                'image_path' => 'products/default.jpg',
                'stock' => rand(5, 50),
                'is_active' => true,
            ]);
        }
    }
}
