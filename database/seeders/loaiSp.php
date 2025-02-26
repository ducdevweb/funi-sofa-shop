<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class loaiSp extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loai_sp')->insert([
            ['loai'=>'Bàn ghế','thu_tu'=>1,'hinh'=>'/assets_ad/images/ban2.jpg'],
            ['loai'=>'Giường ngủ','thu_tu'=>2,'hinh'=>'/assets_ad/images/hinh4.jpg'],
            ['loai'=>'Tủ quần áo','thu_tu'=>3,'hinh'=>'/assets_ad/images/tu2.jpg'],
           ]);
    }
}
