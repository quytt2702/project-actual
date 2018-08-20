<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogThuongGioiThieu extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'log_thuong_gioi_thieu';

    protected $fillable = [
        'id_nguoi_duoc_thuong', 'ten_nguoi_duoc_thuong',
        'id_nguoi_lien_quan', 'ten_nguoi_lien_quan',
        'so_tien', 'li_do', 'hash'
    ];
}
