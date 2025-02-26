<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 15; $i++) {
            DB::table('donhang')->insert([
                'id_nd' => rand(1, 10), // Giả sử bạn có 10 người dùng
                'maDon' => 'DH' . str_pad($i, 3, '0', STR_PAD_LEFT), // Mã đơn hàng như DH001, DH002, ...
                'tenNguoiNhan' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'soDienThoai' => $faker->numerify('0#########'),
                'trangThai' =>2
                , // Trạng thái ngẫu nhiên
                'diaChi' => $faker->address,
                'thanhToan' => rand(0, 1), // Trạng thái thanh toán ngẫu nhiên
                'Hinh_thuc' => rand(0,1),
                'ghiChu' => $faker->sentence,
                'ngayMua' => $faker->dateTimeBetween('-30 days', 'now'), // Ngày mua trong 30 ngày qua
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
