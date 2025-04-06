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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Template::insert([
            ['name' => 'Minimalist', 'preview_image' => 'minimalist.png', 'slug' => 'minimalist'],
            ['name' => 'Professional', 'preview_image' => 'professional.png', 'slug' => 'professional'],
            ['name' => 'Creative', 'preview_image' => 'creative.png', 'slug' => 'creative'],
        ]);
    }
}
