<?php

namespace Database\Factories;

use App\Models\UserQuery;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserQueryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserQuery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'age' => $this->faker->randomDigitNotNull,
        'gender' => $this->faker->word,
        'physical_rating' => $this->faker->word,
        'mental_rating' => $this->faker->word,
        'dailylife_problems' => $this->faker->word,
        'affected_ability' => $this->faker->word,
        'low_down' => $this->faker->word,
        'affected_relationship' => $this->faker->word,
        'experience' => $this->faker->word,
        'note' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
