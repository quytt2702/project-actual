<?php

namespace App\Entities\Slave;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'shop_code',
    ];
}
