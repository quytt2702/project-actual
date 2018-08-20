<?php

namespace App\Entities\Landing;

use App\Entities\Landing\ActionImage;
use App\Entities\Landing\ButtonLink;
use App\Entities\Landing\IconContent;
use App\Entities\Landing\LandingSectionInfo;
use App\Entities\Landing\LandingTheme;
use App\Entities\Landing\PricingRow;
use App\Entities\Landing\PricingTable;
use App\Entities\Landing\SectionQuote;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LandingSection.
 *
 * @package namespace App\Entities\Landing;
 */
class LandingSection extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'theme_id', 'section_type', 'position',
        'code', 'title', 'subtitle', 'description', 'content', 'content_left',
        'content_right', 'image_url', 'video_url', 'guest_full_name',
        'guest_email', 'guest_message', 'background_image_url', 'background_color',
        'countdown_type', 'countdown_time', 'hash', 'menu_title', 'thong_bao',
        'noi_dung_email',
    ];

    public function theme()
    {
        return $this->belongsTo(LandingTheme::class, 'theme_id', 'id');
    }

    public function info()
    {
        return $this->hasOne(LandingSectionInfo::class, 'section_id', 'id');
    }

    public function links()
    {
        return $this
            ->hasMany(ButtonLink::class, 'section_id', 'id')
            ->orderBy('position');
    }

    public function iconContents()
    {
        return $this
            ->hasMany(IconContent::class, 'section_id', 'id')
            ->orderBy('position');
    }

    public function actionImages()
    {
        return $this
            ->hasMany(ActionImage::class, 'section_id', 'id')
            ->orderBy('position');
    }

    public function pricingTables()
    {
        return $this->hasMany(PricingTable::class, 'section_id', 'id');
    }

    public function pricingRows()
    {
        return $this->hasMany(
            PricingRow::class,
            PricingTable::class,
            'section_id',
            'pricing_table_id',
            'id',
            'id'
        );
    }

    public function quotes()
    {
        return $this
            ->hasMany(SectionQuote::class, 'section_id', 'id')
            ->orderBy('position');
    }
}
