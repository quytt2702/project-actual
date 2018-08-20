<?php

namespace App\Strategies\PageRendering;

use App\Repositories\Contracts\SanPhamRepository;
use Cookie;

class GioHangRenderer
{
    protected $sanPham;

    public function __construct(SanPhamRepository $sanPham)
    {
        $this->sanPham = $sanPham;
    }

    public function render($request, $url)
    {
        $list_san_pham = json_decode($request->cookie('list_san_pham'));

        if (!empty($list_san_pham)) {
            // Chuyển list sản phẩm thành list sản phẩm key
            $listSanPhamKey = [];
            $list_san_pham_array_key = [];
            foreach ($list_san_pham as $item) {
                $list_san_pham_array_key[]              = $item->id_san_pham;
                $listSanPhamKey[$item->id_san_pham]     = $item;
            }

            $listSanPham = $this->sanPham->getByIdsWithChuyenMucWithCaiDatNgonNgu($list_san_pham_array_key);
        }

        return view('sections.layouts.gio_hang', compact('listSanPham', 'listSanPhamKey'))->render();
    }
}
