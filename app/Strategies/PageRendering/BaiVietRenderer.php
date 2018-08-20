<?php

namespace App\Strategies\PageRendering;

use App\Repositories\Contracts\BaiVietRepository;

class BaiVietRenderer
{
    protected $sanPham;

    public function __construct(BaiVietRepository $baiViet)
    {
        $this->baiViet = $baiViet;
    }

    public function render($request, $url)
    {
        $baiViet = $this->baiViet->findByUrl($url->url_url);
        if (empty($baiViet)) {
            \Log::error('Bài viết empty ở link: ' . $url->url_url);
            return redirect('/');
        }
        return view('sections.layouts.bai_viet', compact('baiViet'))->render();
    }
}
