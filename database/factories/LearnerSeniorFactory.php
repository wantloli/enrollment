<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearnerSenior>
 */
class LearnerSeniorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'semester' => $this->faker->randomElement(['1st Semester', '2nd Semester']),
            'track' => $this->faker->randomElement(['Academic', 'Technical-Vocational-Livelihood', 'Sports', 'Arts and Design']),
            'strand' => $this->faker->randomElement(['STEM', 'ABM', 'HUMSS', 'GAS', 'ICT', 'IA', 'HE', 'Agri-Fishery Arts', 'Industrial Arts']),
        ];
    }
}
