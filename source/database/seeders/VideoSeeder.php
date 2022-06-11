<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hashtag;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        // for ($i=0; $i < 10; $i ++) {
        //     $hashtags = array_rand(Hashtag::all()->pluck('id')->toArray(), 2);
        //     $video = Video::query()->create([
        //         'user_id' => mt_rand(1, 10),
        //         'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1651981448/videoUser/video_2_onsyif.mp4',
        //         'cover' => 'https://via.placeholder.com/150x150/'.substr(md5(rand()), 0, 6),
        //         'description' => Str::random(20),
        //         'type' => ['PUBLIC', 'PRIVATE', 'SHARE'][mt_rand(0, 2)],
        //     ]);
        //     $video->share_user_id = $video->type === 'SHARE' ? mt_rand(1, 10) : null;
        //     $video->share_video_id = $video->type === 'SHARE' ? mt_rand(1, 10) : null;
        //     $video->save();
        //     $video->hashtags()->syncWithoutDetaching($hashtags);
        // }
        DB::table('videos')->insert([
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654950202/imageUser/ib3ms1ue46ahw373pep7.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950174/ddeouw3xojcpcwa9wl40.mp4',
                'description' => 'Hướng dẫn xét tuyển trực tuyến năm 2021 😁😁',
                'user_id' => 4,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654953058/imageUser/iwtcglrt6j5yz8mhfgto.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654953038/bbpszo2uzig3zcwoimdx.mp4',
                'description' => 'Nữ sinh TDTT đà nẵng 😱😱',
                'user_id' => 1,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://via.placeholder.com/150x150/17d2f6',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1651981448/videoUser/video_2_onsyif.mp4',
                'description' => 'Thời sự UTE',
                'user_id' => 5,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654950460/imageUser/j0treb4jvbievo168hc3.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950427/p432lvy2dw8cvhoy20dh.mp4',
                'description' => 'Giải bóng đá UTE ⚽⚽',
                'user_id' => 5,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://via.placeholder.com/150x150/b495c5',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1651981448/videoUser/video_2_onsyif.mp4',
                'description' => 'Ủng hộ bạn mình nhé :v',
                'user_id' => 1,
                'type' => 'SHARE',
                'share_user_id' => 7,
                'share_video_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654950460/imageUser/j0treb4jvbievo168hc3.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950427/p432lvy2dw8cvhoy20dh.mp4',
                'description' => 'Chia sẻ nào các bạn',
                'user_id' => 5,
                'type' => 'SHARE',
                'share_user_id' => 3,
                'share_video_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654950922/imageUser/l5xubznnciyi9gvjldla.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950891/vaatflyz9zmxzboh45jz.mp4',
                'description' => 'Tuyển sinh ngành công nghệ sinh học UTE',
                'user_id' => 7,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654951319/imageUser/z0y24bvkm97kpxugsild.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654951290/ck1e3mys0pqy3n5khsdb.mp4',
                'description' => 'Sinh viên hoa khôi SPKT và KT 😊😊',
                'user_id' => 9,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654951722/imageUser/ossuiavrwt06vb1ycbqo.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654951690/zt7crtb0eraqmuz6x1ia.mp4',
                'description' => 'Tốt nghiệp đại học Đà Nẵng 👍👍',
                'user_id' => 3,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654950712/imageUser/os2ivmyvpiruptogjsif.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950675/xaszdazeofk8ymlogotk.mp4',
                'description' => 'Giải đua xe tự chế trường ĐHSPKT 😍😍',
                'user_id' => 6,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654949428/imageUser/vut3hgrffoiicyunu6fm.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654949412/giydcpdwspa3zaitumcz.mp4',
                'description' => 'Thời sự về trường SPKT 😃😃',
                'user_id' => 1,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654949488/imageUser/gjbeu4o8die0bhekmxhc.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654949457/jtelgksz11w9uhrom4dy.mp4',
                'description' => 'Ngày thành lập của trường ĐH SPKT 😍😍',
                'user_id' => 1,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654949660/imageUser/oeqtscmpjgem1ucs8alv.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654949602/nigbpvqwp3ntbvm1wvoi.mp4',
                'description' => 'Live stream tư vấn tuyển sinh trường ĐH SPKT 😎😎',
                'user_id' => 2,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654949731/imageUser/xooknz2ltlsidz7bxhml.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654949695/jikftiw8fjwivlzheqiu.mp4',
                'description' => 'Chào mừng tân sinh viên khóa 20 về trường SPKT 😊😊',
                'user_id' => 2,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654949989/imageUser/kgzol0kyty4vs0xq67yi.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654949945/d50ax5erp3qiosqqepkp.mp4',
                'description' => 'Chương trình học bổng trường SPKT :v 😃😃',
                'user_id' => 3,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654950064/imageUser/hqc25gqj8f7jxainobhp.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950025/mzdjrbqdwg87o00dz3od.mp4',
                'description' => 'Tổ chức phiên họp nhiệm kì 2020-2025 trường SPKT 👔👔',
                'user_id' => 3,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654950303/imageUser/fbndxkmediyidoj4nwul.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950287/o3yup24hppv4jls3fpw0.mp4',
                'description' => 'Một ngày vui của UTE 😍😍',
                'user_id' => 4,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654950528/imageUser/lqnb61bekkdovyafii7k.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950498/vvinmvv49dos3d4yq70t.mp4',
                'description' => 'Cuộc thi vẽ kỹ thuật UTE 👷👷',
                'user_id' => 5,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'hthttps://res.cloudinary.com/dswt194ko/image/upload/v1654950793/imageUser/cdz2zfunkdukdv5xjtuu.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950780/ufpyt1gunsz3ezl8wrnn.mp4',
                'description' => 'Máy sát khuẩn tự động của trường ĐHSPKT',
                'user_id' => 6,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654951002/imageUser/mln8riywkmyeoykymwqm.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654950972/xuuyeckk7ljin6izdegz.mp4',
                'description' => '3 trường đại học tốt nhất Đà Nẵng',
                'user_id' => 7,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654951102/imageUser/fckdq9z5y5wspg0pv11p.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654951083/a3vzskygoce5peaiohty.mp4',
                'description' => 'Top 5 về sinh viên Đà Nẵng😍😍',
                'user_id' => 8,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'cover' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654951172/imageUser/s10gpbcqdmidye0jlf3p.png',
                'url' => 'https://res.cloudinary.com/dswt194ko/video/upload/v1654951136/d9ehoe3nmwvv8ymgdzvm.mp4',
                'description' => 'Top 5 về sinh viên Đà Nẵng (phần 5) 😊😊',
                'user_id' => 8,
                'type' => 'PUBLIC',
                'share_user_id' => null,
                'share_video_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
