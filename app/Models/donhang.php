<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{  
    use HasFactory;

    protected $table = 'donhang';
    protected $primaryKey = 'id_dh';

    protected $fillable = [
        'id_nd', 'nguoiNhan', 'maDon',
        'soDienThoai', 'trangThai', 'thanhToan', 
        'Hinh_Thuc', 'diaChi', 'ghiChu', 'ngayMua'
    ];

    public function chitietdon()
    {
        return $this->hasMany(chitietdonhang::class, 'id_dh', 'id_dh');
    }
}
