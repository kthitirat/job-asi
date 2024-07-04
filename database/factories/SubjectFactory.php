<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'name_th' => $this->faker->sentence,
            'name_en' => $this->faker->sentence,
            'code' => strtoupper(
                $this->faker->randomLetter() . $this->faker->randomLetter() . $this->faker->randomNumber(5)
            ),
            'description' => $this->faker->paragraph,
            'unit' => $this->faker->randomElement(['3(3-0-6)', '6(6-0-6)']),
            'published_at' => $this->faker->optional()->dateTimeThisYear,
            'view' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
