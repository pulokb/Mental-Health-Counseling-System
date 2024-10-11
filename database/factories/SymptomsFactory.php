<?php

namespace Database\Factories;

use App\Models\Symptoms;
use Illuminate\Database\Eloquent\Factories\Factory;

class SymptomsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Symptoms::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'username' => $this->faker->word,
        'title' => $this->faker->word,
        'details' => $this->faker->text,
        'image' => $this->faker->word,
        'note' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
