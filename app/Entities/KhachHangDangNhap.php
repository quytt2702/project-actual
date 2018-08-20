<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHangDangNhap extends Authenticatable implements Transformable
{
    use TransformableTrait;

    protected $table = 'khach_hang_dang_nhap';

    protected $fillable = [
        'email', 'password',
    ];
}
