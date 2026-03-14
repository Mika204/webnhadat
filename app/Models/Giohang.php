<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{
    use HasFactory;

    protected $table = 'giohang';
    public $timestamps = false;

    protected $fillable = ['iduser', 'idbds'];

    public function batdongsan()
    {
        return $this->belongsTo(Batdongsan::class, 'idbds');
    }
}
