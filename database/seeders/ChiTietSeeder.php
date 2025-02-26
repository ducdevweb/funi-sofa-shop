<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChiTietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 40; $i++) {
            DB::table('chitiet')->insert([
                'id_dh' => $faker->numberBetween(1, 20), // ID đơn hàng ngẫu nhiên từ 1 đến 20
                'id_sp' => $faker->numberBetween(1, 10), // ID sản phẩm ngẫu nhiên từ 1 đến 10
                'gia_sp' => $faker->randomFloat(2, 100000, 2000000), // Giá sản phẩm ngẫu nhiên từ 100k đến 2 triệu
                'hinh' => 'product' . $faker->numberBetween(1, 10) . '.jpg', // Hình sản phẩm ngẫu nhiên
                'ten_sp' => $faker->words(2, true), // Tên sản phẩm ngẫu nhiên
                'soLuong' => $faker->numberBetween(1, 5), // Số lượng ngẫu nhiên từ 1 đến 5
                'thanh_tien' => $faker->numberBetween(500000, 1000000), // Thành tiền ngẫu nhiên từ 500k đến 1 triệu
                'tongTien' => $faker->numberBetween(500000, 1000000), // Tổng tiền ngẫu nhiên từ 500k đến 1 triệu
                'thanhToan' => $faker->boolean=1, // Trạng thái thanh toán ngẫu nhiên (0 hoặc 1)
                'ngayNhan' => $faker->dateTimeBetween('-12 month', 'now'), // Ngày nhận ngẫu nhiên trong khoảng 1 năm trở lại
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
