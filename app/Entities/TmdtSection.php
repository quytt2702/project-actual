<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TmdtSection extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tmdt_section';

    protected $fillable = [
        'ten', 'number_post', 'image',
        'type', 'is_slide', 'is_html', 'ghi_chu',
    ];
}
