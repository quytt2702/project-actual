<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LichSuBaiViet extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'lich_su_bai_viet';

    protected $fillable = [
        'id_bai_viet', 'tieu_de', 'url', 'mo_ta_ngan',
        'noi_dung', 'keyword', 'id_chuyen_muc',
        'ten_chuyen_muc', 'tags', 'hinh_dai_dien',
        'is_accept', 'is_delete', 'thay_doi',
        'nguoi_tao', 'nguoi_cap_nhat', 'nguoi_duyet',
        'id_nguoi_tao', 'id_nguoi_cap_nhat', 'id_nguoi_duyet',
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
