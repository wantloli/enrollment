<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'house_no' => $this->faker->buildingNumber(),
            'street_name' => $this->faker->streetName(),
            'barangay' => $this->faker->word(),
            'municipality' => $this->faker->city(),
            'province' => $this->faker->state(),
            'country' => $this->faker->country(),
        ];
    }
}
