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
        'iduser', 'idbds', 'ngayDat', 'tienCoc', 'trangThai', 'pttt'
    ];

    public function batdongsan()
    {
        return $this->belongsTo(Batdongsan::class, 'idbds');
    }
}
