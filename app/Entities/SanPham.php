<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SanPham extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'san_pham';

    protected $fillable = [
        'san_pham_ten', 'san_pham_url', 'san_pham_mo_ta',
        'san_pham_hinh_dai_dien', 'san_pham_hinh_anh_slide',
        'san_pham_noi_dung_tab_1', 'san_pham_noi_dung_tab_2',
        'san_pham_noi_dung_tab_3', 'san_pham_noi_dung_tab_4',
        'san_pham_noi_dung_tab_5', 'san_pham_keyword',
        'san_pham_tags', 'san_pham_gia_ban_thuc_te',
        'san_pham_gia_ban_ao', 'san_pham_is_khuyen_mai',
        'san_pham_noi_dung_khuyen_mai', 'san_pham_is_accept', 'san_pham_is_delete',
        'san_pham_id_nguoi_duyet', 'san_pham_nguoi_duyet',
        'san_pham_id_nguoi_tao', 'san_pham_nguoi_tao',
        'san_pham_id_nguoi_cap_nhat', 'san_pham_nguoi_cap_nhat',
        'san_pham_id_nhom_san_pham', 'san_pham_ma', 'san_pham_id_chuyen_muc',
        'san_pham_so_luong', 'id_ngon_ngu',
    ];

    const IS_KHUYEN_MAI = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_DELETE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_ACCEPT = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
