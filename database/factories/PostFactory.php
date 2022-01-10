<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 3),
            'title' => $this->faker->sentence(5, true),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => $this->faker->sentence(10, true),
            'body' => $this->faker->paragraphs(10, true)
        ];
    }
}
