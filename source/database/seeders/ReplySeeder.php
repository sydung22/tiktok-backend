<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reply;
use Illuminate\Support\Str;

class ReplySeeder extends Seeder
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
            Reply::query()->create([
                'comment_id' => mt_rand(1, 10),
                'content' => Str::random(20),
                'user_id' => mt_rand(1, 10),
            ]);
        }
    }
}
