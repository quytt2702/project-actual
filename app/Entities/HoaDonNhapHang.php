<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class HoaDonNhapHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'hoa_don_nhap_hang';

    protected $fillable = [
        'hoa_don_nhap_hang_ten',
        'hoa_don_nhap_hang_chung_tu',
        'hoa_don_nhap_hang_ghi_chu',
        'hoa_don_nhap_hang_email_nguoi_tao',
        'hoa_don_nhap_hang_email_nguoi_sua',
    ];
}
