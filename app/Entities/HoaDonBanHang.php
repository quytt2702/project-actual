<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class HoaDonBanHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'hoa_don_ban_hang';

    protected $fillable = [
        'loai_thanh_toan', 'email_cong_tac_vien',
        'email_khach_hang_mua', 'so_tien_mua',
        'so_milk_mua', 'ma_van_don', 'tracking_link',
        'ghi_chu', 'loai_van_don', 'trang_thai',
        'hash', 'dia_chi_nhan_hang', 'fee_ship', 'email_cap_nhat',
        'sdt_khach_hang_mua', 'chiet_khau',
    ];

    const TRANG_THAI = [
        'CHUA_THANH_TOAN'       => 'CHUA THANH TOAN',
        'DA_THANH_TOAN'         => 'DA THANH TOAN',
        'DANG_VAN_CHUYEN'       => 'DANG VAN CHUYEN',
        'GIAO_KHONG_DUOC'       => 'GIAO KHONG DUOC',
        'THUC_HIEN_THANH_CONG'  => 'THUC HIEN THANH CONG',
        'ADMIN_HUY_DON_HANG'    => 'ADMIN HUY DON HANG',
    ];

    public function getSoTienMuaAttribute($value)
    {
        return empty($value) ? 0 : $value;
    }

    public function getSoMilkMuaAttribute($value)
    {
        return empty($value) ? 0 : $value;
    }
}
