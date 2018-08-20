<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogThuongDonHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'log_thuong_don_hang';

    protected $fillable = [
        'id_nguoi_duoc_thuong', 'ten_nguoi_duoc_thuong', 'id_don_hang',
        'so_tien_mua_don_hang', 'phan_tram_duoc_thuong', 'ten_khach_hang_mua',
        'sdt_khach_hang_mua', 'email_khach_hang_mua', 'so_tien_duoc_thuong',
        'hash', 'ghi_chu', 'cap_thuong',
    ];

    const CAP_THUONG = [
        1 => 1,
        2 => 2,
    ];
}
