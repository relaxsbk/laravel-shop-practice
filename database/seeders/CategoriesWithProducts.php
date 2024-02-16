<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesWithProducts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создание брендов
        Brand::factory(10)->create();

        // Создание категорий с продуктами
        Category::factory(12)
            ->has(Product::factory()
                ->count(27)
            )
            ->create();
    }
}
