<?php

namespace App\Strategies\PageRendering;

use App\Strategies\Contracts\PageRenderingInterface;
use App\Entities\Url;
use App\Entities\Landing\LandingTheme;

class LandingPageRenderer implements PageRenderingInterface
{
    public function render(Url $url)
    {
        $theme = LandingTheme::with('footer', 'sections')
            ->where('url', $url->url_url)
            ->first();

        if (empty($theme)) {
            abort(404);
        }

        return view('admin.landing_page.themes.ca.preview', compact('theme'));
    }
}
