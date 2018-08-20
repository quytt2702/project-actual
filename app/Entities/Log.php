<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Log extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'logs';

    const THE_LOAI = [
        'INFO'      => 'INFO',
        'WARNING'   => 'WARNING',
        'ERROR'     => 'ERROR',
    ];

    protected $fillable = [
        'the_loai', 'noi_dung',
    ];
}
