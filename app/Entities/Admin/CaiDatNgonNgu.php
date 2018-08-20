<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CaiDatNgonNgu extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'cai_dat_ngon_ngu';

    protected $fillable = [
        'hotline', 'chat_js', 'sdt',
        'facebook', 'google_plus', 'weibo',
        'instagram', 'youtube', 'vimeo', 'twitter',
        'don_vi_tinh', 'don_vi_hien_thi',
        'don_hang_dau', 'don_hang_sau',
        'ti_gia_milk', 'id_ngon_ngu',
        'menu_doc', 'menu_ngang', 'footer',
        'ten_menu_doc', 'tieu_de_menu_doc',
        'tieu_de_footer', 'link_tieu_de_footer',
        'sdt_footer', 'dia_chi_footer',
        'tieu_de_menu_01_footer', 'noi_dung_menu_01_body',
        'tieu_de_menu_02_footer', 'noi_dung_menu_02_body',
        'tieu_de_menu_03_footer', 'noi_dung_menu_03_body',
        'link_trang_chu', 'tieu_de_trang_web', 'mo_ta_ngan_footer',
        'is_slider', 'noi_dung_slider', 'logo_web', 'email', 'loai_tieu_de_web',
    ];

    const IS_SLIDER = [
        'YES'  => 'YES',
        'NO'   => 'NO',
    ];

    const LOAI_TIEU_DE_WEB = [
        'CHU'  => 'CHU',
        'HINH' => 'HINH',
    ];

    public function getSdtAttribute($value)
    {
        if (empty($value)) {
            return 'Chưa có';
        }

        return $value;
    }

    public function getEmailAttribute($value)
    {
        if (empty($value) || $value === '') {
            return 'Chưa có';
        }

        return $value;
    }
}
