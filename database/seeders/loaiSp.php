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
            ['loai'=>'giá rẻ'],
            ['loai'=>'giảm sốc'],
            ['loai'=>'cao cấp'],
           ]);
    }
}
