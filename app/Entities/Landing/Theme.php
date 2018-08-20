<?php

namespace App\Entities\Landing;

use App\Entities\Landing\ThemeSection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Theme.
 *
 * @package namespace App\Entities\Landing;
 */
class Theme extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'title', 'content', 'type',
    ];

    public function sections()
    {
        return $this->hasMany(ThemeSection::class, 'theme_id', 'id');
    }
}
