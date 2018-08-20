<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogThuongDaiLy extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'log_thuong_dai_ly';

    protected $fillable = [
        'thang', 'nam', 'email_dai_ly',
        'sdt', 'so_tien_thuong', 'tinh_trang',
        'doanh_thu',
    ];
}
