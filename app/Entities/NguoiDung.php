<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable implements Transformable
{
    use TransformableTrait;

    protected $table = 'nguoi_dung';

    protected $fillable = [
        'password', 'email', 'cmnd', 'so_tai_khoan',
        'ho_va_ten', 'ngay_sinh', 'gioi_tinh', 'txid',
        'is_kich_hoat', 'is_delete', 'email_gioi_thieu',
        'sdt', 'facebook', 'dia_chi_hien_tai',
        'dia_chi_cmnd', 'ten_chu_tai_khoan', 'ten_chi_nhanh',
        'id_nhom_quyen', 'id_ngan_hang'
    ];

    const GIOI_TINH = [
        'NAM' => 'NAM',
        'NU' => 'NỮ',
    ];

    const IS_KICH_HOAT = [
        'NOT_YET' => 'NOT_YET',
        'PENDING' => 'PENDING',
        'DONE' => 'DONE',
    ];

    const IS_DELETE = [
        'YES' => 'YES',
        'NO' => 'NO',
    ];
}
