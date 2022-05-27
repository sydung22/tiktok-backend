<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hashtag;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Hashtag::factory(10)->create();
        $this->call([
            VideoSeeder::class,
            RuleCoinSeeder::class,
            FollowSeeder::class,
            LikeSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
