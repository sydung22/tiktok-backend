<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reply;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        // for ($i = 0; $i < 10; $i++) {
        //     Reply::query()->create([
        //         'comment_id' => mt_rand(1, 10),
        //         'content' => Str::random(20),
        //         'user_id' => mt_rand(1, 10),
        //     ]);
        // }
        DB::table('replies')->insert([
            [
                'comment_id' => 8,
                'content' => 'Hay thật bạn ơi :v',
                'user_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 7,
                'content' => 'Ủng hộ 2 tay :))',
                'user_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 6,
                'content' => 'Ngại gì không chia sẻ nhỉ',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 9,
                'content' => 'Video xuất sắc quá bạn nhỉ',
                'user_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 5,
                'content' => 'Xứng đáng được điểm 10 nha ^^',
                'user_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 1,
                'content' => 'Vỗ tay :v Qúa hay',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 7,
                'content' => 'Khá bổ ích :)) Cần làm video hay hơn nhé',
                'user_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 5,
                'content' => 'Nên chia sẻ đúng không nào',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 2,
                'content' => 'Xuất sắc bạn ơi',
                'user_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'comment_id' => 6,
                'content' => 'Mọi người ủng hộ nhiệt tình nhé :v',
                'user_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
