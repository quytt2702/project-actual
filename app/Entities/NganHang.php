<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class NganHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'ngan_hang';

    protected $fillable = [
        'ten_ngan_hang'
    ];
}
