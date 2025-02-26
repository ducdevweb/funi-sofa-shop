<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table='sanpham';
    public $primaryKey='id_sp';
    protected $attributes=['anHien'=>1];
    protected $fillable=['ten_sp','gia_sp','danhgia','hinh','giaSale'
    ,'soLuong','moTa','loai_go','kich_thuoc','mau_sac','bao_hanh','hot',
    'binhluan','luot_xem','luot_mua','id_loaisp','id_nsx','anHien','ngayDang'];
    public function nsx()
    {
        return $this->belongsTo(loai::class, 'id_nsx','id_nsx');
    }
    public function danhmuc(){
        return $this->belongsTo(danhmuc::class,'id_loaisp','id_loaisp');
    }
    public function binhluans()
    {
        return $this->hasMany(binhluan::class, 'id_sp', 'id_sp');
    }
}
