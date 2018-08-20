<?php

namespace App\Strategies\PageRendering;

use App\Repositories\Contracts\BaiVietRepository;

class ThongTinWebRenderer
{
    public function render($noi_dung)
    {
        return view('sections.layouts.thong_tin_web', compact('noi_dung'))->render();
    }
}
