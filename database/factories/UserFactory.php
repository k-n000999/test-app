<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;  //この行を追加
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $role = $this->faker->randomElement(['student', 'mentor']);
        $name = $this->faker->name; // 名前を生成

        // 学生またはメンターのためのデフォルト属性
        $attributes = [
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('testpass'), // パスワードを固定で設定
            'role' => $role,
        ];

        if ($role === 'student') {
            // 学生の場合、Student モデルのファクトリを使用して属性を設定
            $student = StudentFactory::new()->create([
                'name' => $name, // User と同じ名前を使用
            ]);

            $attributes['detail_id'] = $student->id;
        } elseif ($role === 'mentor') {
            // メンターの場合、メンター専用の属性を設定
            $attributes['detail_id'] = MentorFactory::new()->create([
                'name' => $name, // User と同じ名前を使用
            ])->id;
        }

        return array_merge([
            'name' => $name, // User と同じ名前を使用
        ], $attributes);
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
