<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Albun>
 */
class AlbunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'date' => $this->faker->dateTimeBetween('-50 years', 'now')->format('Y-m-d'),
            'id_banda' => $this->faker->numberBetween(1, 50), // Número de faixas entre 1 e 50
        ];
    }
}
