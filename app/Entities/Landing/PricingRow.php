<?php

namespace App\Entities\Landing;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PricingRow.
 *
 * @package namespace App\Entities\Landing;
 */
class PricingRow extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pricing_table_id', 'content',
    ];
}
