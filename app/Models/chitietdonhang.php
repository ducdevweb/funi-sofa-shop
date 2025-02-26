<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;

    protected $table = 'chitiet';
    public $primaryKey = 'id_ct';
    protected $fillable = [
        'id_dh',
        'id_sp',
        'gia_sp',
        'hinh',
        'ten_sp',
        'soLuong',
        'thanh_tien',
        'tongTien',
        'thanhToan',
        'ngayNhan','id_ct'
    ];

    public function donhangs() {
        return $this->belongsTo(donhang::class, 'id_dh', 'id_dh');
    }
}
