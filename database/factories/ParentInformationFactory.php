<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParentInformation>
 */
class ParentInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'father_last_name' => $this->faker->lastName(),
            'father_first_name' => $this->faker->firstNameMale(),
            'father_middle_name' => $this->faker->lastName(),
            'father_contact_number' => $this->faker->phoneNumber(),
            'mother_last_name' => $this->faker->lastName(),
            'mother_first_name' => $this->faker->firstNameFemale(),
            'mother_middle_name' => $this->faker->lastName(),
            'mother_contact_number' => $this->faker->phoneNumber(),
            'legal_last_name' => $this->faker->lastName(),
            'legal_first_name' => $this->faker->firstName(),
            'legal_middle_name' => $this->faker->lastName(),
            'legal_contact_number' => $this->faker->phoneNumber(),
        ];
    }
}
