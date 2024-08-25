<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;
    protected $table='chitiet';
    public $primaryKey='id_ct';
    protected $data=[];
    protected $fillabel=['id_dh','gia_sp','hinh','ten_sp'
                        ,'soLuong','thanh_tien','tongTien','thanhToan'];
}
