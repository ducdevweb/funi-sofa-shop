<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phanhoi_bl extends Model
{
    use HasFactory;
    
    protected  $table='phanhoi_bl';
    public $primaryKey='id_phbl';
    protected $attributes=[];
    protected $date=['ngayDang'];
    protected $fillable=['id_bl','id_nd','ten_nd','phanhoi','anHien','ngayDang'];
    public function binhLuan()
    {
        return $this->belongsTo(binhluan::class, 'id_bl','id_bl');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_nd');
    }
}
