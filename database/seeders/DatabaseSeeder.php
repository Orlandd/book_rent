<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use App\Models\RentLog;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name' => 'Admin',
        ]);

        Role::create([
            'name' => 'Member',
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Fiksi',
        ]);

        Category::create([
            'name' => 'Romance',
        ]);

        Category::create([
            'name' => 'Comic',
        ]);

        Author::create([
            'name' => 'Kristina',
        ]);

        Author::create([
            'name' => 'Tina',
        ]);

        Author::create([
            'name' => 'Kristi',
        ]);

        Book::factory(10)->create();

        // BookCategory::factory(10)->create();

        RentLog::factory(10)->create();
    }
}
