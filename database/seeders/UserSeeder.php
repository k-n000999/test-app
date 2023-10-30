<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory()->count(50)->create();

        Tag::factory()->count(5)->create();

        User::all()->each(function ($user) {
            $tags = Tag::inRandomOrder()->take(3)->get(); // ランダムなタグを選択
            $user->tags()->attach($tags); // タグをユーザーに関連付ける
        });
    }
}
