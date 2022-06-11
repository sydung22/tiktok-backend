<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        // for ($i = 0; $i < 10; $i++) {
        //     Like::query()->create([
        //         'user_id' => mt_rand(1, 10),
        //         'likeable_id' => mt_rand(1, 10),
        //         'likeable_type' => ['App\Models\Video', 'App\Models\Comment', 'App\Models\Reply'][mt_rand(0, 2)],
        //     ]);
        // }
        DB::table('likes')->insert([
            [
                'likeable_id' => 2,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 5,
                'likeable_type' => 'App\\Models\\Reply',
                'user_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 5,
                'likeable_type' => 'App\\Models\\Reply',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 5,
                'likeable_type' => 'App\\Models\\Reply',
                'user_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 8,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 1,
                'likeable_type' => 'App\\Models\\Reply',
                'user_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 10,
                'likeable_type' => 'App\\Models\\Comment',
                'user_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 2,
                'likeable_type' => 'App\\Models\\Reply',
                'user_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 6,
                'likeable_type' => 'App\\Models\\Reply',
                'user_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 2,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 9,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 22,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 20,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 18,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 16,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 14,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 13,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 11,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 2,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'likeable_id' => 4,
                'likeable_type' => 'App\\Models\\Video',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
