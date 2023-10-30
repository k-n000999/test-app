<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $uniqueTagName = $this->faker->unique()->randomElement(['Java', 'JavaScript', 'PHP', 'Laravel', 'Python']);
        return [
            'name' => $uniqueTagName,
            //
        ];
    }
}
