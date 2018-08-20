<?php

namespace App\Strategies\PageRendering;

use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\ChuyenMucSanPhamRepository;

class ChuyenMucSanPhamRenderer
{
    protected $sanPham;
    protected $chuyenMucSanPham;

    public function __construct(
        SanPhamRepository $sanPham,
        ChuyenMucSanPhamRepository $chuyenMucSanPham
    ) {
        $this->sanPham          = $sanPham;
        $this->chuyenMucSanPham = $chuyenMucSanPham;
    }

    public function render($request, $url)
    {
        $chuyenMucSanPham  = $this->chuyenMucSanPham->findByUrl($url->url_url);
        $sanPham           = $this->sanPham->getByIdChuyenMuc($chuyenMucSanPham->id);

        return view('sections.layouts.chuyen_muc_san_pham', compact('sanPham'))->render();
    }
}
