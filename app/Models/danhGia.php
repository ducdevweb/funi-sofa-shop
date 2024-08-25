<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhGia extends Model
{
    use HasFactory;
    protected $table ='danhgia';
    public $primaryKey='id_dg';
    protected $dates=[];
    protected $fillabel=['id_sp','id_nd','danhGia','ngayDang'];
}
