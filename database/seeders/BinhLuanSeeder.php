<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN'); // Sử dụng ngôn ngữ tiếng Việt

        // Mảng các câu bình luận tiếng Việt
        $binhluan_mau = [
            'Sản phẩm rất tốt, tôi rất hài lòng.',
            'Dịch vụ chăm sóc khách hàng tuyệt vời.',
            'Giao hàng nhanh, đóng gói cẩn thận.',
            'Chất lượng sản phẩm vượt ngoài mong đợi.',
            'Tôi sẽ giới thiệu cho bạn bè về sản phẩm này.',
            'Giá cả hợp lý, sản phẩm chất lượng.',
            'Sản phẩm không đúng như mô tả, tôi hơi thất vọng.',
            'Dịch vụ giao hàng quá chậm, cần cải thiện.',
            'Tôi thích thiết kế của sản phẩm, rất tinh tế.',
            'Hỗ trợ khách hàng nhanh chóng và nhiệt tình.'
        ];

        for ($i = 0; $i < 20; $i++) {
            DB::table('binhluan')->insert([
                'id_nd' => rand(1, 10), 
                'ten_nd' => $faker->name,
                'id_sp' => rand(1, 16), 
                'hinh_bl'=>'/assets_ad/images/ban2.jpg',
                'noiDung' => $binhluan_mau[array_rand($binhluan_mau)], 
                'danhgia' => rand(1, 5), 
                'anHien' => rand(0, 1),
                'ngayDang' => $faker->dateTimeBetween('-1 months', 'now'), 
                'created_at' => now(), 
                'updated_at' => now(),
            ]);
        }
    }
}
