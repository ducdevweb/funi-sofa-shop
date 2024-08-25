<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    use HasFactory;
    protected $table ='nsx';
    public $primaryKey='id_nsx';
    protected $attributes=['anHien'=>0];
    protected $dates=[];
    protected $fillabel=['ten_nsx','thuTu','anHien'];
    public function sanphams()
    {
        return $this->hasMany(sanpham::class, 'id_nsx');
    }
}
