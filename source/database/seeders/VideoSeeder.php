<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hashtag;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 10; $i ++) {
            $hashtags = array_rand(Hashtag::all()->pluck('id')->toArray(), 2);
            $video = Video::query()->create([
                'user_id' => mt_rand(1, 10),
                'url' => 'https://via.placeholder.com/150x150/'.substr(md5(rand()), 0, 6),
                'cover' => 'https://via.placeholder.com/150x150/'.substr(md5(rand()), 0, 6),
                'time_view' => mt_rand() / mt_getrandmax()
            ]);
            $video->hashtags()->syncWithoutDetaching($hashtags);
        }
    }
}
