<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class NgonNgu extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'ngon_ngu';

    protected $fillable = [
        'ma', 'ten', 'url', 'is_open',
        'link_web',
    ];

    const IS_OPEN = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
