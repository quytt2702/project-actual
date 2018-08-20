<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ChuyenMucSanPham extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'chuyen_muc_san_pham';

    protected $fillable = [
        'chuyen_muc_san_pham_ten', 'chuyen_muc_san_pham_url',
        'chuyen_muc_san_pham_is_active', 'chuyen_muc_san_pham_id_ngon_ngu',
    ];

    const IS_ACTIVE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
