<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecialNeed>
 */
class SpecialNeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'with_diagnosis' => $this->faker->sentence(),
            'with_manifestations' => $this->faker->sentence(),
            'is_have_pwd_id' => $this->faker->boolean(),
        ];
    }
}
