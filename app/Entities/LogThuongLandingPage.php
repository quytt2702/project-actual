<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogThuongLandingPage extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'log_thuong_landing_page';

    protected $fillable = [
        'id_nguoi_duoc_thuong', 'ten_nguoi_duoc_thuong', 'id_landing_page',
        'ten_landing_page', 'san_pham_landing_page', 'ten_khach_hang_mua',
        'sdt_khach_hang_mua', 'email_khach_hang_mua', 'so_tien_duoc_thuong',
        'pham_tram_duoc_thuong', 'so_tien_hoa_hong_mua', 'so_tien_duoc_thuong',
        'hash',
    ];
}
