<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'learning_language' => $this->faker->randomElement(['Java', 'JavaScript', 'PHP', 'Laravel']),
            'experience_level' => $this->faker->randomElement(['beginner', 'intermediate', 'advanced']),
            //
        ];
    }
}
