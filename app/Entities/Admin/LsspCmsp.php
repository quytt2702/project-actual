<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LsspCmsp extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'lssp_cmsp';

    protected $fillable = [
        'id_lssp', 'id_cmsp'
    ];
}
