<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Boardgame;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningClass>
 */
class LearningClassFactory extends Factory
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
            'instructor' => $this->faker->name(),
            'description' => $this->faker->paragraph(5),
            'location' => $this->faker->address(),
            'start_time' => $this->faker->dateTimeBetween('now', '+2 month'),
            //'duration' => $this->faker->numberBetween(1, 3) . ' hours',
            'duration' => ($this->faker->numberBetween(1, 16) * 15) . ' mins',
            'hourly_price' => $this->faker->randomFloat(2, 10, 100),
            'Boardgame_id' => Boardgame::inRandomOrder()->first()?->id ?? null, // Set to null or use a factory to create a related Boardgame
        ];
    }
}
