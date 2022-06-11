<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'sydung.18T2',
                'fullname' => 'Nguyễn Sỹ Dũng',
                'email' => 'sydung@gmail.com',
                'age' => 22,
                'gender' => 'male',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948898/imageUser/lp5cw9cgm08gveeukcbr.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 1,
                'coins' => 29,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'zqkEuRMT74',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'ngocbao.18T2',
                'fullname' => 'Trần Ngọc Bảo',
                'email' => 'ngocbao@gmail.com',
                'age' => 21,
                'gender' => 'male',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948828/imageUser/anhthe5_nueacx.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 0,
                'coins' => 12,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'IovbNkm8XR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'thienan.18T2',
                'fullname' => 'Phạm Thiên An',
                'email' => 'thienan@gmail.com',
                'age' => 20,
                'gender' => 'female',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948828/imageUser/anhthe4_nfwdtc.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 0,
                'coins' => 13,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'ErpuM6FjDK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'thanhdanh.18T3',
                'fullname' => 'Nguyễn Thanh Danh',
                'email' => 'thanhdanh@gmail.com',
                'age' => 19,
                'gender' => 'male',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948827/imageUser/%E1%BA%A3nh_7_m9jhf4_k5bhk0.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 1,
                'coins' => 5,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'Udqqw9v8di',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'dinhhung.18T1',
                'fullname' => 'Trần Đình Hưng',
                'email' => 'dinhhung@gmail.com',
                'age' => 18,
                'gender' => 'male',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948827/imageUser/anhthe1_yx800x.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 1,
                'coins' => 10,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'Tyybq0hiAy',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'tienkhoa.18T3',
                'fullname' => 'Võ Tiến Khoa',
                'email' => 'tienkhoa@gmail.com',
                'age' => 20,
                'gender' => 'male',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948898/imageUser/lp5cw9cgm08gveeukcbr.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 1,
                'coins' => 8,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'bXxBjzA5hw',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'maichi.18T4',
                'fullname' => 'Nguyễn Mai Chi',
                'email' => 'maichi@gmail.com',
                'age' => 22,
                'gender' => 'female',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948827/imageUser/%E1%BA%A3nh_9_pxgaoy_yurrag.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 1,
                'coins' => 10,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'ideSuX2Sgo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'vynguyen.18T1',
                'fullname' => 'Nguyễn Thị Vy',
                'email' => 'vynguyen@gmail.com',
                'age' => 23,
                'gender' => 'female',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948827/imageUser/%E1%BA%A3nh_10_ntgeuw_xrav4z.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 0,
                'coins' => 11,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'XJ8UhwWRW8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'ngoctran.18T3',
                'fullname' => 'Võ Ngọc Trân',
                'email' => 'ngoctran@gmail.com',
                'age' => 21,
                'gender' => 'female',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948826/imageUser/%E1%BA%A3nh_6_d60crt_fcakxe.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 0,
                'coins' => 5,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'qebn94bxNZ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'havi.18T2',
                'fullname' => 'Nguyễn Thị Hà Vi',
                'email' => 'havi@gmail.com',
                'age' => 21,
                'gender' => 'female',
                'avatar' => 'https://res.cloudinary.com/dswt194ko/image/upload/v1654948898/imageUser/lp5cw9cgm08gveeukcbr.jpg',
                'description' => 'Xin chào mình là sinh viên UTE :v',
                'facebook' => 'https://www.facebook.com/',
                'role' => 0,
                'coins' => 3,
                'email_verified_at' => Carbon::now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => '2gh9pyKPKa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
