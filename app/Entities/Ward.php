<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Ward extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'ward';

    protected $fillable = [
        'wardid', 'name', 'type', 'location', 'districtid'
    ];
}
