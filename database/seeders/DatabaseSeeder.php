<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Category::factory(3)->create();
        Book::factory(10)->create();
        User::factory()->create([
            'name' => 'abdessamd',
            'email' => 'test@examplee.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
