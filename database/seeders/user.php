<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([
        ['name'=>'admin','email'=>'admin@gmail.com','password'=>Hash::make('admin'),
        'phone'=>'1265165156','address'=>'185 Đường Đông Bắc','role'=>0],
        ['name'=>'khach','email'=>'khach@gmail.com','password'=>Hash::make('khach'),
        'phone'=>'1651651655','address'=>'185 Đường Đông Bắc','role'=>1],
        ['name'=>'duc','email'=>'duc@gmail.com','password'=>Hash::make('duc'),
        'phone'=>'1591951994','address'=>'185 Đường Đông Bắc','role'=>1]
       ]);

       }
    }

