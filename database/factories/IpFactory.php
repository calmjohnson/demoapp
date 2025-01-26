<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ip>
 */
class IpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => fake()->unique()->ipv4(),
            'status' => fake()->boolean(0.5),
            'country' => fake()->country(),
            'location' => fake()->address(),
            'provider' => fake()->company(),
            'tags' => fake()->words(2, true),
            'traffic' => fake()->randomDigit()
        ];
    }
}
