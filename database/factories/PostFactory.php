<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 10),
            'title' => $this->faker->title,
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'image' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
