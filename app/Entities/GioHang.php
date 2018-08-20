<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class GioHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'gio_hang';

    protected $fillable = [
        'gio_hang_email', 'gio_hang_noi_dung',
    ];
}
