<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TinhThanh extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tinh_thanh';

    protected $fillable = [
        'ten_tinh_thanh'
    ];
}
