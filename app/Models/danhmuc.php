<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    protected $table ='loai_sp';
    public $primaryKey='id_loaisp';
    protected $dates=[];
    protected $fillabel=['loai','thu_tu','hinh'];
    public function sanpham(){
        return $this->hasMany(sanpham::class,'id_loaisp');
    }
}
