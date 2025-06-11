<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['admin', 'editor', 'user','moderator']),
            'news_access' => fake()->boolean(),
            'menu_access' => fake()->boolean(),
            'about_us_access' => fake()->boolean(),
            'about_us_gallery_access' => fake()->boolean(),
            'slider_gallery_access' => fake()->boolean(),
            'gallery_access' => fake()->boolean(),
            'contact_access' => fake()->boolean(),
            'business_information_access' => fake()->boolean(),
        ];
    }
}
