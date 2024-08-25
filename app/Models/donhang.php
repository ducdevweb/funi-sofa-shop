<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    protected $table='donhang';
    public $primaryKey='id_dh';
    protected $attributes=['trangThai'=>0];
    protected $dates=[];
    protected $fillabel=['id_nd','nguoiNhan',
    'soDienThoai','trangThai','diaChi','ghiChu','ngayMua'];
    use HasFactory;
}
