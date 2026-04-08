<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Khuvuc;
use App\Models\Hinhanh;


class BatDongSan extends Model
{
    protected $table = 'batdongsan';
    protected $primaryKey = 'idbds';

    public $timestamps = false;
    protected $fillable = [
        'tenBds',
        'gia',
        'diaChi',
        'moTa',
        'idKv',
        'iduser',
        'trangThai'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }

    public function khuvuc()
    {
        return $this->belongsTo(KhuVuc::class, 'idKv', 'idKv');
    }
    public function hinhanhs()
    {   
        return $this->hasMany(Hinhanh::class, 'idbds', 'idbds');
    }

    public function datlichhens()
    {
        return $this->hasMany(Datlichhen::class, 'idbds', 'idbds');
    }
    
}