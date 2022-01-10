<?php

namespace Database\Factories;

use App\Models\Plant;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'plant-image/default.png',
            'name' => $this->faker->name(),
            'class' => $this->faker->word(), 
            'family' => $this->faker->word(), 
            'genus' => $this->faker->word(), 
            'kingdom' => $this->faker->word(), 
            'ordo' => $this->faker->word(), 
            'divisi' => $this->faker->word(), 
        ];
    }
}
