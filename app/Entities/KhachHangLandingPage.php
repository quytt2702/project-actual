<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class KhachHangLandingPage extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'khach_hang_landing_page';

    protected $fillable = [
        'email', 'ho_ten', 'sdt',
        'link_landing_page', 'email_ctv', 'ip',
        'ghi_chu', 'yeu_cau_them',
    ];
}
