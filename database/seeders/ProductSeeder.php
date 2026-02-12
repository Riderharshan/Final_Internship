<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;   // ✅ THIS MUST BE EXACT

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Brake Disc Plate',
                'price' => 1200,
                'image' => 'brake-disc.jpg',
                'bike_brand' => 'Yamaha',
                'category_id' => 2,
                'description' => 'High quality front brake disc plate'
            ],
            [
                'name' => 'Chain Sprocket Kit',
                'price' => 2500,
                'image' => 'chain-kit.jpg',
                'bike_brand' => 'KTM',
                'category_id' => 3,
                'description' => 'Durable chain sprocket kit'
            ],
            [
                'name' => 'Engine Oil Filter',
                'price' => 450,
                'image' => 'oil-filter.jpg',
                'bike_brand' => 'Honda',
                'category_id' => 1,
                'description' => 'Genuine engine oil filter'
            ],
            [
                'name' => 'Front Brake Pads',
                'price' => 800,
                'image' => 'brake-pads.jpg',
                'bike_brand' => 'Bajaj',
                'category_id' => 2,
                'description' => 'Long lasting front brake pads'
            ],
            [
                'name' => 'Air Filter',
                'price' => 600,
                'image' => 'air-filter.jpg',
                'bike_brand' => 'TVS',
                'category_id' => 1,
                'description' => 'High performance air filter'
            ],
        ]);
    }
}
