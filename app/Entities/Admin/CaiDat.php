<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CaiDat extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'cai_dat_chung';

    protected $fillable = [
        'email', 'email_password', 'thuong_gioi_thieu_dang_ky',
        'so_lan_nap_sai_lien_tuc',
        'phan_tram_thuong_doanh_thu_cap_1',
        'phan_tram_thuong_doanh_thu_cap_2',
        'logo', 'don_hang_dau', 'don_hang_sau',
        'phi_ship_ctv', 'phi_ship_cod', 'phi_ship_ngan_luong',
    ];
}
