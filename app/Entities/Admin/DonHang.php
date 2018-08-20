<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DonHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'don_hang';
    
    protected $fillable = [
        'tinh_trang', 'ten_khach_hang', 'nguoi_gioi_thieu'
    ];
}
