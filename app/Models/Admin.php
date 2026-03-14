<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'idadmin';
    public $timestamps = false;

    protected $fillable = [
        'emailadmin',
        'passwordadmin'
    ];

    protected $hidden = [
        'passwordadmin'
    ];
}
