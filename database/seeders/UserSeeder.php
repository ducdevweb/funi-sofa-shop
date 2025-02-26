<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'first_email' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'phone' => '1265165156',
                'address' => '185 Đường Đông Bắc',
                'role' => 0,  
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'khach',
                'first_email' => 'khach',
                'email' => 'khach@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('khach'),
                'phone' => '1651651655',
                'address' => '185 Đường Đông Bắc',
                'role' =>1 ,  
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'duc',
                'first_email' => 'duc', 
                'email' => 'duc@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('duc'),
                'phone' => '1591951994',
                'address' => '185 Đường Đông Bắc',
                'role' =>1 ,  
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'nhanvien',
                'first_email' => 'nhanvien', 
                'email' => 'nhanvien@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('nhanvien'),
                'phone' => '159195158',
                'address' => '185 Đường Đông Bắc',
                'role' =>2 ,  
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'shipper',
                'first_email' => 'shipper', 
                'email' => 'shipper@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('shipper'),
                'phone' => '1591951936',
                'address' => '185 Đường Đông Bắc',
                'role' =>3 ,  
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
