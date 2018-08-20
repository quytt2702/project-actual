<?php

namespace App\Entities\Landing;

use App\Entities\Landing\ThemeSection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SectionQuote.
 *
 * @package namespace App\Entities\Landing;
 */
class SectionQuote extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author', 'subtitle', 'stars', 'content', 'section_id', 'position',
    ];

    public function section()
    {
        return $this->hasOne(ThemeSection::class, 'section_id', 'id');
    }
}
