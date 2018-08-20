<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LichSuSanPham extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'lich_su_san_pham';

    protected $fillable = [
        'id_san_pham', 'ten', 'mo_ta', 'hinh_anh_1', 'hinh_anh_2',
        'url', 'noi_dung_tab_1', 'noi_dung_tab_2', 'noi_dung_tab_3',
        'noi_dung_tab_4', 'noi_dung_tab_5', 'don_gia_ban',
        'don_gia_khuyen_mai', 'co_khuyen_mai', 'hang_tang_kem'
    ];
}
