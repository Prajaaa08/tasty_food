<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::factory()->create([
            'name' => 'Super Admin',
            'news_access' => true,
            'menu_access' => true,
            'about_us_access' => true,
            'about_us_gallery_access' => true,
            'slider_gallery_access' => true,
            'gallery_access' => true,
            'contact_access' => true,
            'business_information_access' => true,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'role_id' => 1, // Assuming the first role is 'Super Admin'
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
