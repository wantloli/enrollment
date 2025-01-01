<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReturningLearner>
 */
class ReturningLearnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grade_level' => $this->faker->randomElement(['Grade 11', 'Grade 12']),
            'school_year' => $this->faker->year() . '-' . ($this->faker->year() + 1),
            'school' => $this->faker->company(),
            'school_id' => $this->faker->numerify('SCH####'),
        ];
    }
}
