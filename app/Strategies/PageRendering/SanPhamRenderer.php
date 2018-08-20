<?php

namespace App\Strategies\PageRendering;

use App\Repositories\Contracts\TabRepository;
use App\Repositories\Contracts\SanPhamRepository;

class SanPhamRenderer
{
    protected $sanPham;

    public function __construct(
        TabRepository $tab,
        SanPhamRepository $sanPham
    ) {
        $this->tab = $tab;
        $this->sanPham = $sanPham;
    }

    public function render($request, $url)
    {
        $sanPham        = $this->sanPham->findByUrl($url->url_url);
        $list_san_pham  = json_decode($request->cookie('list_san_pham'));
        $tabs           = $this->tab->all();
        $soLuong = 1;

        if (!empty($list_san_pham)) {
            foreach ($list_san_pham as $item) {
                if ($item->id_san_pham == $sanPham->id) {
                    $soLuong = $item->so_luong;
                }
            }
        }

        return view('sections.layouts.chi_tiet', compact('sanPham', 'soLuong', 'tabs'))->render();
    }
}
