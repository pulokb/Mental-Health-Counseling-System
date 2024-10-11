<?php

namespace Database\Factories;

use App\Models\DoctorFeedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DoctorFeedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Assign random values for IDs
            'userqueries_id' => $this->faker->randomDigitNotNull,
            'user_id' => $this->faker->randomDigitNotNull,
            'admin_id' => $this->faker->randomDigitNotNull,

            // Personal details
            'user_name' => $this->faker->name,       // Generates a random user name
            'age' => $this->faker->numberBetween(18, 65), // Random age between 18 and 65
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']), // Random gender
            'occupation' => $this->faker->jobTitle,  // Random occupation

            // Overall result and feedback
            'overall_result' => $this->faker->text,
            'status'=>$this->faker->randomElement(['Good', 'Moderate', 'Weak']), // Random result,
            'educational' => $this->faker->text,     // Random educational feedback
            'family' => $this->faker->text,          // Random family-related feedback
            'relationship' => $this->faker->text,    // Random relationship-related feedback
            'job' => $this->faker->text,             // Random job-related feedback
            'general' => $this->faker->text,         // Random general feedback

            // User message and feedback details
            'message' => $this->faker->sentence,     // Random user message
            'symptoms' => $this->faker->text,        // Random symptoms description
            'suggestions' => $this->faker->text,     // Random suggestions
            'note' => $this->faker->text,            // Random additional note

            // Timestamps
            'created_at' => $this->faker->date('Y-m-d H:i:s'), // Random created date
            'updated_at' => $this->faker->date('Y-m-d H:i:s')  // Random updated date
        ];
    }
}
