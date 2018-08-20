<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CodeNapDiem extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'code_nap_diem';

    protected $fillable = [
        'ma_nap_tien', 'seri', 'hide_hash',
        'so_diem', 'email_nguoi_tao', 'dot_tao_ma',
        'email_nguoi_nap', 'ngay_nap',
        'trang_thai', 'is_active',
    ];

    const TRANG_THAI = [
        'NOT_YET'   => 'NOT YET',
        'DONE'      => 'DONE',
    ];

    const IS_ACTIVE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
