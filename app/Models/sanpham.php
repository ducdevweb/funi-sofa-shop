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
    ,'soLuong','moTa','loai_go','kich_thuoc','mau_sac','bao_hanh','hot','binhluan'];
    public function nsx()
    {
        return $this->belongsTo(loai::class, 'id_nsx');
    }
    public function binhluans()
    {
        return $this->hasMany(binhluan::class, 'id_sp', 'id_sp');
    }
}
