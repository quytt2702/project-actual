<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PhanTramThuongDaiLy extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'phan_tram_thuong_dai_ly';

    protected $fillable = [
        'muc_yeu_cau_duoi', 'muc_yeu_cau_tren', 'phan_tram_thuong'
    ];
}
