<?php

namespace App\Entities\Landing;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MenuItem.
 *
 * @package namespace App\Entities\Landing;
 */
class MenuItem extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'menu_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'theme_id', 'section_id', 'menu_text',
    ];
}
