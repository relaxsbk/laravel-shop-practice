<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWithReviewsProducts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создание пользователей
        User::factory(10)->create()->each(function ($user) {
            // Создание отзывов для каждого пользователя
            $numReviews = rand(1, 5); // Случайное количество отзывов для пользователя
            for ($i = 0; $i < $numReviews; $i++) {
                // Выбор случайного товара и создание отзыва
                $product = Product::all()->random();
                Review::factory()->create([
                    'user_id' => $user->id,
                    'product_id' => $product->id
                ]);
            }
        });
    }
}
