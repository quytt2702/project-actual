<?php

namespace App\Strategies\PageRendering;

use App\Repositories\Contracts\BaiVietRepository;
use App\Repositories\Contracts\ChuyenMucRepository;

class ChuyenMucBaiVietRenderer
{
    protected $baiViet;
    protected $chuyenMucBaiViet;

    public function __construct(
        BaiVietRepository $baiViet,
        ChuyenMucRepository $chuyenMucBaiViet
    ) {
        $this->baiViet          = $baiViet;
        $this->chuyenMucBaiViet = $chuyenMucBaiViet;
    }

    public function render($request, $url)
    {
        $chuyenMucBaiViet = $this->chuyenMucBaiViet->findByUrl($url->url_url);
        $baiViet          = $this->baiViet->getByIdChuyenMuc($chuyenMucBaiViet->id);

        return view('sections.layouts.chuyen_muc_bai_viet', compact('baiViet'))->render();
    }
}
