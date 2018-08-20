<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CmspSp extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'cmsp_sp';

    protected $fillable = [
        'id_cmsp', 'id_sp'
    ];
}
