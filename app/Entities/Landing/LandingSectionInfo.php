<?php

namespace App\Entities\Landing;

use App\Entities\Landing\LandingSection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LandingSectionInfo.
 *
 * @package namespace App\Entities\Landing;
 */
class LandingSectionInfo extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'landing_section_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'section_id', 'show_full_name', 'show_email', 'show_phone', 'show_notes',
        'show_extra_req', 'text_full_name', 'text_email', 'text_phone', 'text_notes',
        'text_extra_req', 'text_link_affiliate',
    ];

    protected $primaryKey = 'section_id';

    public function section()
    {
        return $this->belongsTo(LandingSection::class, 'section_id', 'id');
    }
}
