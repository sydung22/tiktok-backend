<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        // for ($i = 0; $i < 10; $i++) {
        //     Comment::query()->create([
        //         'user_id' => mt_rand(1, 10),
        //         'video_id' => mt_rand(1, 10),
        //         'content' => Str::random(20),
        //     ]);
        // }
        DB::table('comments')->insert([
            [
                'video_id' => 9,
                'content' => 'Video hay lắm bạn ơi ^^',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 8,
                'content' => 'Xứng đáng điểm 10 cho bài đăng này :v',
                'user_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 5,
                'content' => 'Nên chia sẻ bài đăng này nhé :v',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 9,
                'content' => 'Quá hay :v :)',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 3,
                'content' => 'Chỉ mình làm video với bạn ơi ^^',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 7,
                'content' => 'Học ở đây ổn không nhỉ ??',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 9,
                'content' => 'Xứng đáng ngôi trường tốt ở ĐN ^^',
                'user_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 5,
                'content' => 'Ngành IT trường mình lấy mấy điểm vậy',
                'user_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 5,
                'content' => 'Trường học tốt quá :)',
                'user_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'video_id' => 4,
                'content' => 'Chắc phải rủ bạn bè học ở đây thôi @@',
                'user_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
