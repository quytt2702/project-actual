<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TienNguoiDung extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tien_nguoi_dung';

    protected $fillable = [
        'email', 'nap_api', 'the_milk', 'tong_tien_vnd',
        'thuong_gioi_thieu_ctv', 'thuong_dai_ly',
        'thuong_hoa_hong_muc_1', 'thuong_hoa_hong_muc_2',
        'vnd_pending',
    ];
}
