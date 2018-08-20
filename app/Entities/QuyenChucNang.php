<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class QuyenChucNang extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'quyen_chuc_nang';

    protected $fillable = [
        'id_quyen', 'id_chuc_nang'
    ];
}
