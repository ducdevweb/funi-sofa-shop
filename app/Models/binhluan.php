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
    protected $fillable=['id_sp','id_nd','noiDung','anHien','ngayDang'];
    public function binh_luan(): HasMany {
        return $this->hasMany(User::class,'id');
    }
    public function sanpham()
    {
        return $this->belongsTo(loai::class, 'id_sp');
    }

}
