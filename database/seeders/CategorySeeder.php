<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;   // ✅ ADD THIS LINE

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Engine Parts'],
            ['name' => 'Brake Parts'],
            ['name' => 'Chain & Sprocket'],
            ['name' => 'Accessories'],
        ]);
    }
}
