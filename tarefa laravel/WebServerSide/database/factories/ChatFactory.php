<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $dateSequence = null;

        if ($dateSequence === null) {
            $dateSequence = Carbon::now()->subYears(1);
        } else {
            $dateSequence = $dateSequence->addDay();
        }

        return [
            'title' => $this->faker->words(3, true),
            'date' => $dateSequence,
            'coment' => $this->faker->sentence(),
            'id_user' => $this->faker->numberBetween(1, 50),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
