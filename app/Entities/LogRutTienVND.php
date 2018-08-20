<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogRutTienVND extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'log_rut_tien_vnd';

    protected $fillable = [
        'id', 'email_rut_tien', 'so_tien',
        'tinh_trang', 'ngan_hang', 'thong_bao',
    ];
}
