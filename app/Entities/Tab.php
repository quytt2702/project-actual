<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tab extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tabs';

    protected $fillable = [
        'ten_tab', 'is_open',
    ];

    const IS_OPEN = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
