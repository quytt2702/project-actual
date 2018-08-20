<?php

namespace App\Entities\Admin;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class KhachHang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'khach_hang';
    
    protected $fillable = [
        'ten', 'sdt', 'ngay_sinh', 'email',
        'dia_chi', 'dia_chi_giao_hang'
    ];
}
