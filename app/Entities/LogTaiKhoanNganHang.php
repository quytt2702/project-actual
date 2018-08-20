<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogTaiKhoanNganHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'log_tai_khoan_ngan_hang';

    protected $fillable = [
        'email', 'so_tai_khoan', 'ten_chi_nhanh',
        'ten_chu_tai_khoan', 'thay_doi', 'quyen',
        'hash', 'trang_thai',
    ];

    const QUYEN = [
        'ADMIN'             => 'ADMIN',
        'CONG_TAC_VIEN'     => 'CONG_TAC_VIEN',
        'NGUOI_DUNG'        => 'NGUOI_DUNG',
    ];

    const TRANG_THAI = [
        'NOT_YET'   => 'NOT YET',
        'BLOCK'     => 'BLOCK',
        'DONE'      => 'DONE',
    ];
}
