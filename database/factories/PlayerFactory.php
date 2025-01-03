<?php

namespace Database\Factories;

use App\Models\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genders = Gender::all()->toArray();
        return [
            'name' => fake()->firstName() . " " . fake()->lastName(),
            'gender_id' => $genders[array_rand($genders)]['id'],
            'skill' => rand(1, 100),
            'strength' => rand(1, 100),
            'speed' => rand(1, 100),
            'reaction' => rand(1, 100)
        ];
    }
}
