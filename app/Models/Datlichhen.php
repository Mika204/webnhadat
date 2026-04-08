<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datlichhen extends Model
{
    use HasFactory;

    protected $table = 'datlichhen';
    protected $primaryKey = 'id_dat_lich_hen';
    public $timestamps = false;

    protected $fillable = [
        'id_nguoi_mua',
        'idbds',
        'ngayDat',
        'tienCoc',
        'pttt',
        'trangThai'
    ];

    public function nguoiMua()
    {
        return $this->belongsTo(User::class, 'id_nguoi_mua');
    }


    public function batdongsan()
    {
        return $this->belongsTo(Batdongsan::class, 'idbds', 'idbds');
    }
}