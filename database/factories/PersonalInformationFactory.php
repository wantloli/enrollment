<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalInformation>
 */
class PersonalInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'birth_certificate_no' => $this->faker->optional()->numerify('##########'),
            'last_name' => $this->faker->lastName(),
            'middle_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'extension_name' => $this->faker->optional()->suffix(),
            'age' => $this->faker->numberBetween(16, 25),
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'religion' => $this->faker->word(),
            'mother_tongue' => $this->faker->word(),
            'four_ps_household_number' => $this->faker->optional()->numerify('##########'),
        ];
    }
}
