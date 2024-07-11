<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "slug"=>fake()->slug(),
            "title"=>fake()->sentence(),
            "body"=>fake()->paragraph(),
            "category_id"=>Category::factory(),
            "user_id"=>User::factory(),
        ];
    }
}
