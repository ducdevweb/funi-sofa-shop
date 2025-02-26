<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'baiviet';
    protected $primaryKey = 'id_bv';
 
    protected $fillable = [
        'tieu_de',
        'hinh_bv',
        'id_nd',
        'tac_gia',
        'noi_dung',
        'ngay_dang'
    ];
}


