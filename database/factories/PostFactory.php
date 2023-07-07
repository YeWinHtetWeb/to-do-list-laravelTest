<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $address = ['Yangon', 'Mandalay', 'Pyay', 'Bago', 'Pyin Oo Lwin', 'Taung Gyi', 'InLay'];
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->text(1000),
            'price' => rand(2000, 5000),
            'address' => $address[array_rand($address)],
            'rating' => rand(0, 5)
        ];
    }
}
