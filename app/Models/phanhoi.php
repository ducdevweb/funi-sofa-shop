<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phanhoi extends Model
{
    use HasFactory;
    protected $table='phanhoi';
    protected $primaryKey='id_ph';
    public $fillable=['id_user','da_xu_ly','ho_ten','loi_nhan','ngay_gui'];
}
