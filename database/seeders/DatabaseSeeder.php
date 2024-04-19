<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'Test'
        ]);

        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]);

        User::factory(10)->create();

        Category::factory(5)
            ->has(Article::factory(10))
            ->create();
    }
}
