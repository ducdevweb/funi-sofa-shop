<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class binhluan extends Model
{
    use HasFactory;
    protected  $table='binhluan';
    public $primaryKey='id_bl';
    protected $attributes=[];
    protected $date=['ngayDang'];
    protected $fillable=['id_sp','id_nd','noiDung','danhgia','anHien','da_xu_ly','ngayDang'];
    public function sanpham()
    {
        return $this->belongsTo(loai::class, 'id_sp');
    }
    public function chitietdonhang()
    {
        return $this->belongsTo(chitietdonhang::class, 'maBl', 'maBl'); 
    }
    public function phanhois()
    {
        return $this->hasMany(phanhoi_bl::class, 'id_bl','id_bl');
    }
}
