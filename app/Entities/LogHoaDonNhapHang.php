<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogHoaDonNhapHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'log_hoa_don_nhap_hang';

    protected $fillable = [
        'id_san_pham', 'so_luong_san_pham_nhap', 'don_gia_nhap_san_pham',
        'id_nha_cung_cap', 'id_hoa_don_nhap_hang', 'ngay_thay_doi',
        'email_cap_nhat',
    ];
}
