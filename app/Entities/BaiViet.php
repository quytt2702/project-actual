<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BaiViet extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'bai_viet';

    protected $fillable = [
        'tieu_de', 'url', 'mo_ta_ngan',
        'noi_dung', 'keyword', 'id_chuyen_muc',
        'ten_chuyen_muc', 'tags', 'hinh_dai_dien',
        'is_accept', 'is_delete',
        'nguoi_tao', 'nguoi_cap_nhat', 'nguoi_duyet',
        'id_nguoi_tao', 'id_nguoi_cap_nhat', 'id_nguoi_duyet'
    ];

    const IS_ACCEPT = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_DELETE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
