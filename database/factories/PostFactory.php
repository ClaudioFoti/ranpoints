<?php

namespace Database\Factories;

use App\Models\Post;
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
    public function definition()
    {
        return [
            'body' => fake()->text(),
            'user_id' => fake()->numberBetween(1, 15),
            'parent_post_id' => fake()->optional()->numberBetween(1, 10),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $url = 'https://source.unsplash.com/random/1200x800';
            $post
                ->addMediaFromUrl($url)
                ->toMediaCollection();
        });
    }
}
