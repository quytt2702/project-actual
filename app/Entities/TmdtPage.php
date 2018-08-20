<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TmdtPage extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tmdt_page';

    protected $fillable = [
        'url', 'email_nguoi_tao', 'email_nguoi_edit',
        'sections', 'ten_trang', 'tags',
        'keywords', 'is_trang_chu',
        'is_view', 'is_delete',
    ];

    const IS_TRANG_CHU = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_VIEW = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    const IS_DELETE = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];
}
