<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaSanXuat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nsx')->insert([
            ['ten_nsx'=>'Dunelm Group (Anh)','thuTu'=>1],
            ['ten_nsx'=>'Sin Wee Seng Industries Sdn Bhd (SWS)','thuTu'=>2],
            ['ten_nsx'=>'Aaron (Mỹ)','thuTu'=>3],
          

        ]);
    }
}
