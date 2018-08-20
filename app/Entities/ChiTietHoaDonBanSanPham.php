<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ChiTietHoaDonBanSanPham extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'chi_tiet_hoa_don_ban_san_pham';

    protected $fillable = [
        'id_hoa_don_ban_hang', 'so_luong', 'don_gia',
        'tong_tien_milk', 'tong_tien_vnd',
        'loai_thanh_toan', 'tinh_trang',
        'id_san_pham', 'phan_tram_chieu_khau',
    ];

    const TINH_TRANG = [
        'X' => 'X',
        'Y' => 'Y',
        'Z' => 'Z',
    ];
}
