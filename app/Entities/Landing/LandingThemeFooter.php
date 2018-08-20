<?php

namespace App\Entities\Landing;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LandingThemeFooter.
 *
 * @package namespace App\Entities\Landing;
 */
class LandingThemeFooter extends Model implements Transformable
{
    use TransformableTrait;

    const INPUT_FIELDS = [
        'content',
    ];

    protected $table = 'landing_theme_footer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'landing_theme_id', 'logo', 'content',
    ];
}
