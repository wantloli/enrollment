<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_year' => $this->faker->year() . '-' . ($this->faker->year() + 1),
            'learners_reference_no' => $this->faker->numerify('##########'),
            'grade_to_enroll' => $this->faker->optional()->randomElement(['Grade 11', 'Grade 12']),
            'personal_information_id' => \App\Models\PersonalInformation::factory(),
            'address_id' => \App\Models\Address::factory()->nullable(),
            'parent_information_id' => \App\Models\ParentInformation::factory()->nullable(),
            'special_need_id' => \App\Models\SpecialNeed::factory()->nullable(),
            'returning_learner_id' => \App\Models\ReturningLearner::factory()->nullable(),
            'learners_senior_id' => \App\Models\LearnerSenior::factory()->nullable(),
            'distance_learning_preference' => $this->faker->optional()->randomElement(['Online', 'Modular', 'Blended']),
        ];
    }
}
