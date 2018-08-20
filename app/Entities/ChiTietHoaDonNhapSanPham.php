<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ChiTietHoaDonNhapSanPham extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'chi_tiet_hoa_don_nhap_san_pham';

    protected $fillable = [
        'id_hoa_don_nhap_san_pham', 'id_san_pham',
        'so_luong_san_pham_nhap', 'don_gia_nhap_san_pham',
        'id_nha_cung_cap',
    ];
}
