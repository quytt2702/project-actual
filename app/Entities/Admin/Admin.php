<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements Transformable
{
    use TransformableTrait;

    protected $table = 'admin';

    protected $fillable = [
        'username', 'password', 'email',
        'is_delete', 'is_block', 'ho_va_ten',
        'id_nhom_quyen',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    const IS_BLOCK = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_DELETE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
