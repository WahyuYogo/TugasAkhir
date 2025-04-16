<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Template::insert([
            ['name' => 'Example 1', 'preview_image' => 'ex1.png', 'slug' => 'ex1'],
            ['name' => 'Example 2', 'preview_image' => 'ex2.png', 'slug' => 'ex2'],
            ['name' => 'Example 3', 'preview_image' => 'ex3.png', 'slug' => 'ex3'],
            ['name' => 'Example 4', 'preview_image' => 'ex4.png', 'slug' => 'ex4'],
        ]);
    }
}
