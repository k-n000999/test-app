<?php

namespace Database\Factories;

use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;  //この行を追加
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mentor>
 */
class MentorFactory extends Factory
{
    protected $model = Mentor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'teaching_languages' => $this->faker->randomElement(['Java', 'JavaScript', 'PHP', 'Laravel']),
            'experience_years' => $this->faker->numberBetween(1, 3),  //この行を追加
            'introduction' => $this->faker->realText(20),  //この行を追加
        ];
    }
}
