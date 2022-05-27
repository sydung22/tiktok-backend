<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Follow;

class FollowSeeder extends Seeder
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
            Follow::query()->create([
                'user_id_1' => mt_rand(1, 10),
                'user_id_2' => mt_rand(1, 10),
            ]);
        }
    }
}
