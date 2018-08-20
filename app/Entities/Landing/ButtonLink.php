<?php

namespace App\Entities\Landing;

use App\Entities\Landing\LandingSection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ButtonLink.
 *
 * @package namespace App\Entities\Landing;
 */
class ButtonLink extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'content', 'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(LandingSection::class, 'section_id', 'id');
    }
}
