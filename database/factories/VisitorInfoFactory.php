<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisitorInfo>
 */
class VisitorInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_agent' => $this->faker->word,
            'ip_address' => $this->faker->word,
            'count' => $this->faker->numberBetween(1,100),
        ];
    }
}
