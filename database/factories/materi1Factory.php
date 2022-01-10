<?php

namespace Database\Factories;

use App\Models\materi1;
use Illuminate\Database\Eloquent\Factories\Factory;

class materi1Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = materi1::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no' => 1,
            'soal' => 'test soal',
            'a' => 'a',
            'b' => 'b',
            'c' => 'c',
            'd' => 'd',
            'benar' => 'a',
            'image' => 'soal/default.png'
        ];
    }
}
