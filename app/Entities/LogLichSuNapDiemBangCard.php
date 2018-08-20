<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogLichSuNapDiemBangCard extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'log_lich_su_nap_diem_bang_card';

    protected $fillable = [
        'ma_nap', 'seri', 'hide_hash',
        'so_diem', 'id_nap_diem', 'email_nap_diem',
        'ngay_nap', 'trang_thai', 'so_lan_that_bai_lien_tuc',
    ];

    const TRANG_THAI = [
        'YES'   => 'YES',
        'NO'    => 'NO',
    ];
}
