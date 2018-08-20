<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ChiTietNhapHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_nhap_hang', 'id_san_pham', 'so_luong',
        'don_gia_nhap', 'ghi_chu'
    ];
}
