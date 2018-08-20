<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class KhachHangLangdingPage extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'khach_hang_langding_page';

    protected $fillable = [
        'email','ho_va_ten', 'sdt',
        'link_landing_page', 'email_chia_se',
    ];
}
