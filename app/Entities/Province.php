<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Province extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'province';

    protected $fillable = [
        'provinceid', 'name', 'type',
    ];
}
