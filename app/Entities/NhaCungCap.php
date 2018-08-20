<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class NhaCungCap extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'nha_cung_cap';

    protected $fillable = [
        'nha_cung_cap_ten', 'nha_cung_cap_dia_chi',
        'nha_cung_cap_phone_01', 'nha_cung_cap_phone_02',
        'nha_cung_cap_is_active', 'nha_cung_cap_is_delete',
        'nha_cung_cap_thong_tin_them', 'hinh_anh',
    ];

    const IS_ACTIVE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_DELETE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
