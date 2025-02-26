<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voucher')->insert([
            [
                'ma_giam_gia' => 'VOUCHER10',
                'so_tien_giam' => '10',
                'gioi_han_su_dung' => 100,
                'an_hien' => 0,
                'da_su_dung' => 0,
                'ngay_bat_dau' => now(),
                'ngay_het_han' => now()->addDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_giam_gia' => 'VOUCHER20',
                'so_tien_giam' => '20',
                'gioi_han_su_dung' => 50,
                'an_hien' => 1,
                'da_su_dung' => 0,
                'ngay_bat_dau' => now(),
                'ngay_het_han' => now()->addDays(15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_giam_gia' => 'VOUCHER30',
                'so_tien_giam' => '30',
                'gioi_han_su_dung' => 30,
                'an_hien' => 1,
                'da_su_dung' => 0,
                'ngay_bat_dau' => now(),
                'ngay_het_han' => now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
