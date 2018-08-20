<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SoDiem extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'so_diem';

    protected $fillable = [
        'noi_dung','so_diem',
    ];

    const KICH_HOAT = [
        'NO'  => 'NO',
        'YES' => 'YES',
    ];
}
