<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Павел',
            'surname' => 'Пожидаев',
            'login' => 'admin',
            'email' => 'pah4n1989@gmail.com',
            'password' => Hash::make('admin11'),
            'role' => 'admin',
        ]);

        // Создание категории "Смартфоны"
        $category = Category::firstOrCreate(
            ['code' => 'smartphones'],
            [
                'title' => 'Смартфоны',
                'description' => 'Категория для смартфонов',
                'img' => '/storage/static/homePage/category-smartphone.png',
                'is_public' => true,
            ]
        );

        // Создание бренда "Apple"
        $brand = Brand::firstOrCreate(
            ['name' => 'Apple'],
            [
                'img' => '/storage/static/brand/apple.png',
                'is_public' => true,
            ]
        );

        // Создание товаров
        $products = [
            [
                'title' => 'iPhone 13',
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'model' => 'Pro',
                'description' => 'Смартфон iPhone 13',
                'img' => '/storage/static/homePage/card/iphone_13.jpg',
                'price' => 80000,
                'quantity' => 10,
                'rating' => 0,
                'is_public' => true,
            ],
            [
                'title' => 'iPhone 16',
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'model' => 'Pro',
                'description' => 'Смартфон iPhone 16',
                'img' => '/storage/static/homePage/card/iphone_16.jpg',
                'price' => 165000,
                'quantity' => 15,
                'rating' => 0,
                'is_public' => true,
            ],
        ];

        // Добавление товаров в базу данных
        foreach ($products as $productData) {
            Product::firstOrCreate(
                ['title' => $productData['title']],
                $productData
            );
        }




        $this->call([
            CategoriesWithProducts::class,
            UserWithReviewsProducts::class,
            CategoryCharacteristicSeeder::class,
            CharacteristicSeeder::class
        ]);

    }
}
