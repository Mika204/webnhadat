<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BatDongSan;

class Khuvuc extends Model
{
    use HasFactory;

    protected $table = 'khuvuc';
    protected $primaryKey = 'idKv';
    public $timestamps = false;

    protected $fillable = ['tenKv'];
    public function batdongsan()
    {
        return $this->hasMany(BatDongSan::class, 'idkhuvuc', 'idkhuvuc');
    }
}
