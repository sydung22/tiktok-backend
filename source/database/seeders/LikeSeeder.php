<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeSeeder extends Seeder
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
            Like::query()->create([
                'user_id' => mt_rand(1, 10),
                'likeable_id' => mt_rand(1, 10),
                'likeable_type' => ['App\Models\Video', 'App\Models\Comment', 'App\Models\Reply'][mt_rand(0, 2)],
            ]);
        }
    }
}
