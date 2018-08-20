<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class NhomQuyen extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'nhom_quyen';

    protected $fillable = [
        'ten_nhom', 'mo_ta'
    ];
}
