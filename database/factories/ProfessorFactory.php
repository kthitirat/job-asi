<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professor>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => Department::inRandomOrder()->first()?->id ?? Department::factory(),
            'prefix' => $this->faker->randomElement(['ดร.', 'ผศ.ดร.', 'รศ.ดร.', 'ศ.']),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName
        ];
    }
}
