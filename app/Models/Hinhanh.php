<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    use HasFactory;

    protected $table = 'hinhanh';
    protected $primaryKey = 'idHinhanh';
    public $timestamps = false;

    protected $fillable = ['idbds', 'duong_dan_anh'];

    public function batdongsan()
    {
        return $this->belongsTo(Batdongsan::class, 'idbds');
    }
}
