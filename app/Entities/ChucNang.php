<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ChucNang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'chuc_nang';

    protected $fillable = [
        'chuc_nang_ma_code', 'chuc_nang_ten',
        'chuc_nang_id_phu', 'chuc_nang_ten_nhom',
    ];
}
