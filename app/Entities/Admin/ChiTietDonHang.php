<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ChiTietDonHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'chi_tiet_don_hang';
    
    protected $fillable = [
        'chi_tiet_don_hang', 'id_don_hang', 'id_san_pham',
        'so_luong', 'thanh_phan'
    ];
}
