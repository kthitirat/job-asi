<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performance>
 */
class PerformanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'institution_head_name' => $this->faker->name,
            'institution_head_position' => $this->faker->jobTitle,
            'coordinator_position' => $this->faker->jobTitle,
            'name' => $this->faker->sentence,
            'type' => $this->faker->randomElements(
                ['การแสดงนาฏศิลป์ไทย', 'การแสดงนาฏศิลป์พื้นบ้าน', 'การแสดงนาฏศิลป์ร่วมสมัย'],
                $this->faker->numberBetween(1, 3)
            ),
            'description' => $this->faker->paragraph,
            'duration' => $this->faker->time('H:i'),
            'number_of_performers' => $this->faker->numberBetween(1, 20),
            'directors' => $this->faker->name,
            'performers' => $this->faker->name,
            'musicians_or_narrators' => $this->faker->name,
            'number_of_musicians' => $this->faker->numberBetween(1, 10),
            'opening_scene' => $this->faker->sentence,
            'stage_performance' => $this->faker->sentence,
            'ending_scene' => $this->faker->sentence,
            'costume_and_props' => $this->faker->sentence,
            'stage_lighting' => $this->faker->sentence,
            'sound_type' => $this->faker->word,
            'number_of_microphones' => $this->faker->numberBetween(1, 5),
            'number_of_amplifiers' => $this->faker->numberBetween(1, 5),
            'other_specifications' => $this->faker->sentence,
            'sound_control' => $this->faker->sentence,
            'institution_representatives' => $this->faker->name,
            'faculty_and_staff' => $this->faker->name,
            'students' => $this->faker->name,
            'vehicles' => $this->faker->sentence,
            'arrival_date' => $this->faker->dateTimeBetween('now', '+1 years'),
            'arrival_time' => $this->faker->time('H:i'),
            'departure_date' => $this->faker->dateTimeBetween('now', '+1 years'),
            'departure_time' => $this->faker->time('H:i'),
            'accommodation' => $this->faker->sentence,
            'ceremony_and_reception_details' => $this->faker->paragraph,
            'number_of_institution_heads' => $this->faker->numberBetween(1, 5),
            'number_of_faculty_and_staff' => $this->faker->numberBetween(1, 50),
            'number_of_students' => $this->faker->numberBetween(10, 1000),
            'is_published' => $this->faker->boolean,
        ];
    }
}
