<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Url extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'url';

    protected $fillable = [
        'url_url', 'url_ten_loai', 'url_noi_dung',
        'id_ngon_ngu', 'is_view_cong_tac_vien',
    ];

    const TEN_LOAI = [
        'THONG_TIN_WEB' => 'THONG TIN WEB',
        'LANDING_PAGE'  => 'LANDING PAGE',
        'CM_SAN_PHAM'   => 'CM SAN PHAM',
        'CM_BAI_VIET'   => 'CM BAI VIET',
        'SAN_PHAM'      => 'SAN PHAM',
        'BAI_VIET'      => 'BAI VIET',
        'DEFAULT'       => 'DEFAULT',
        'TMDT'          => 'TMDT',
        'KHAC'          => 'KHAC',
    ];

    const IS_VIEW_CONG_TAC_VIEN = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
