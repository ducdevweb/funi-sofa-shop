<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanHoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 10 phản hồi mẫu
        for ($i = 1; $i <= 10; $i++) {
            DB::table('phanhoi')->insert([
                'id_user' => rand(1, 10), // Giả định có 10 người dùng
                'ho_ten' => 'Người dùng ' . $i,
                'da_xu_ly' => rand(0, 1), // Ngẫu nhiên đã xử lý hay chưa
                'email' => 'user' . $i . '@example.com',
                'loi_nhan' => 'Đây là phản hồi chất lượng sản phẩm số ' . $i,
                'ngay_gui' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
