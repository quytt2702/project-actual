<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LsbvCm extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'lsbv_cm';
    protected $fillable = [
        'id_chuyen_muc', 'id_lich_su_bai_viet'
    ];
}
