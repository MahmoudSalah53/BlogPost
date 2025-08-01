<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition (): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(3),
            'slug' => $this->faker->slug(),
            'status' => 'published',
            'featured_image' => $this->faker->imageUrl(),
            'author_id' => 2,
        ];
    }
}
