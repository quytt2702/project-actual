<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class KhachHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'khach_hang';

    protected $fillable = [
        'email','sdt','ho_ten','duong', 'phuong',
        'quan_huyen','thanh_pho','email_ctv',
    ];
}
