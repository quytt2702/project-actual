<?php

namespace App\Entities\Landing;

use App\Entities\Landing\LandingSection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class IconContent.
 *
 * @package namespace App\Entities\Landing;
 */
class IconContent extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon', 'title', 'content', 'section_id', 'position',
    ];

    public function section()
    {
        return $this->belongsTo(LandingSection::class, 'section_id', 'id');
    }
}
