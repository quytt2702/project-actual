<?php

namespace App\Entities\Landing;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PricingTable.
 *
 * @package namespace App\Entities\Landing;
 */
class PricingTable extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'action_text', 'action_url', 'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(ThemeSection::class, 'section_id', 'id');
    }
}
