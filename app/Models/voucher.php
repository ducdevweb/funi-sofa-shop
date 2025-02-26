<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    public $primaryKey='id_mgg';
    public $fillable = [
        'ma_giam_gia',
        'phan_tram_giam',
        'so_tien_giam',
        'ngay_bat_dau',
        'ngay_het_han',
        'gioi_han_su_dung',
        'da_su_dung',
        'an_hien'
    ];
}
