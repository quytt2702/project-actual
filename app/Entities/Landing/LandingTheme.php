<?php

namespace App\Entities\Landing;

use App\Entities\Landing\ButtonLink;
use App\Entities\Landing\IconContent;
use App\Entities\Landing\ActionImage;
use App\Entities\Landing\LandingSection;
use App\Entities\Landing\LandingThemeFooter;
use App\Entities\Landing\MenuItem;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LandingTheme extends Model implements Transformable
{
    use TransformableTrait;

    const URL_TYPE = 'LANDING_PAGE';

    protected $fillable = [
        'title', 'keywords', 'tags', 'json_ld', 'content', 'menu_type', 'code',
        'hotline', 'script_js', 'url', 'logo', 'created_at', 'updated_at',
        'thong_bao', 'noi_dung_email', 'san_pham_muon_ban_id', 'ten_nut','is_muon_ban'
    ];

    const IS_MUON_BAN = [
        'NO'  => 'NO',
        'YES' => 'YES',
    ];

    public function footer()
    {
        return $this->hasOne(LandingThemeFooter::class, 'landing_theme_id', 'id');
    }

    public function sections()
    {
        return $this
            ->hasMany(LandingSection::class, 'theme_id', 'id')
            ->orderBy('position');
    }

    public function links()
    {
        return $this
            ->hasManyThrough(
                ButtonLink::class,
                LandingSection::class,
                'theme_id',
                'section_id'
            );
    }

    public function iconContents()
    {
        return $this
            ->hasManyThrough(
                IconContent::class,
                LandingSection::class,
                'theme_id',
                'section_id'
            );
    }

    public function actionImages()
    {
        return $this
            ->hasManyThrough(
                ActionImage::class,
                LandingSection::class,
                'theme_id',
                'section_id'
            );
    }

    public function quotes()
    {
        return $this
            ->hasManyThrough(
                SectionQuote::class,
                LandingSection::class,
                'theme_id',
                'section_id'
            );
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'theme_id', 'id');
    }
}
