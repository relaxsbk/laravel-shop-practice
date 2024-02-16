<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            CategoriesWithProducts::class
        ]);

//        User::query()->create([
//            'name' => 'Павел',
//            'surname' => 'Пожидаев',
//            'login' => 'admin',
//            'email' => 'pah4n1989@gmail.com',
//            'password' => Hash::make('admin11'),
//            'role' => 'admin',
//        ]);
    }
}
