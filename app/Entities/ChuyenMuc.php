<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ChuyenMuc extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'chuyen_muc';

    protected $fillable = [
        'ten_chuyen_muc', 'url', 'is_active', 'id_ngon_ngu'
    ];

    const IS_ACTIVE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
