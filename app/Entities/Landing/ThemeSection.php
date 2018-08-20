<?php

namespace App\Entities\Landing;

use App\Entities\Landing\Theme;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ThemeSection.
 *
 * @package namespace App\Entities\Landing;
 */
class ThemeSection extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'theme_sections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'title', 'content', 'icon', 'image_url', 'theme_id',
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id', 'id');
    }
}
