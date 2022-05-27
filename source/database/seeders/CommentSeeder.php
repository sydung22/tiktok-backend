<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 10; $i++) {
            Comment::query()->create([
                'user_id' => mt_rand(1, 10),
                'video_id' => mt_rand(1, 10),
                'content' => Str::random(20),
            ]);
        }
    }
}
