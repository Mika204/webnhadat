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
    // Laravel Auth sẽ lấy password ở đây
    public function getAuthPassword()
    {
        return $this->passwordadmin;
    }

    // Laravel Auth sẽ login bằng emailadmin
    public function getAuthIdentifierName()
    {
        return 'emailadmin';
    }
}
