<?php

namespace App\Strategies\PageRendering;

use DB;

use App\Entities\TmdtPage;
use App\Repositories\Contracts\TmdtPageRepository;

class ThuongMaiDienTuRenderer
{
    protected $tmdtPage;

    public function __construct(TmdtPageRepository $tmdtPage)
    {
        $this->tmdtPage = $tmdtPage;
    }

    public function render($request, $url)
    {
        $thongTinPage = $this->tmdtPage->findByUrl($url->url_url);

        if ($thongTinPage->is_view === TmdtPage::IS_VIEW['NO']) {
            return redirect('/');
        };

        $sections     = json_decode($thongTinPage->sections);

        // [{"section_id":"1","section_ten":"s5","section_the_loai":"1","ten_view":"dqw","danh_sach_chuyen_muc":[1],"kieu_sap_xep":"1","so_luong_post":"123","is_html":"NO","is_slide":"NO","danh_sach_slide":[]},{"section_id":"2","section_ten":"s2","section_the_loai":"1","ten_view":"213","danh_sach_chuyen_muc":[2,3],"kieu_sap_xep":"1","so_luong_post":"2","is_html":"YES","noi_dung_html":"12d","is_slide":"YES","danh_sach_slide":[3]}]
        $html = '';

        foreach ($sections as $item) {
            $sapXep = '';
            $theLoai = '';
            $tenView = $item->ten_view;
            $soLuongPost = $item->so_luong_post;

            if ($item->section_the_loai === '1') {
                $theLoai .= 'san_pham';
                $chuyenMucArray = json_encode($item->danh_sach_chuyen_muc);

                $query = DB::table('san_pham')->limit($soLuongPost);

                if (! empty($item->danh_sach_chuyen_muc)) {
                    $query->where(function ($rootQuery) use ($item) {
                        foreach ($item->danh_sach_chuyen_muc as $idDanhMuc) {
                            $rootQuery->orWhere('san_pham_id_chuyen_muc', 'LIKE', '%"' . $idDanhMuc .  '"%');
                        }
                    });
                }

                if ($item->kieu_sap_xep == "1") { // Giá tăng dần
                    $query->orderBy('san_pham_gia_ban_thuc_te', 'ASC');
                } elseif ($item->kieu_sap_xep == "2") { // Giá giảm dần
                    $query->orderBy('san_pham_gia_ban_thuc_te', 'DESC');
                } elseif ($item->kieu_sap_xep == "3") { // Ngày tăng dần
                    $query->orderBy('created_at', 'ASC');
                } elseif ($item->kieu_sap_xep == "4") { // Ngày giảm dần
                    $query->orderBy('created_at', 'DESC');
                }

                // $sql = 'SELECT * FROM san_pham where san_pham.san_pham_id_chuyen_muc in (' . implode(',', $item->danh_sach_chuyen_muc) . ') ' . $sapXep . ' LIMIT ' . $soLuongPost;
                $items = $query->get();
            } else {
                return 'Không test vào đây!!!';
                $theLoai .= 'bai_viet';

                if ($item->kieu_sap_xep === '1') { // Giá tăng dần
                    $sapXep .= 'ORDER BY san_pham.created_at ASC';
                } elseif ($item->kieu_sap_xep === '2') { // Giá giảm dần
                    $sapXep .= 'ORDER BY san_pham.created_at DESC';
                }
            }

            if ($item->section_id === '1') {
                $html .= view('sections.section_01', compact('items', 'tenView'))->render();
            } elseif ($item->section_id === '2') {
                $html .= view('sections.section_02', compact('items', 'tenView'))->render();
            } elseif ($item->section_id === '3') {
                $html .= view('sections.section_03', compact('items', 'tenView'))->render();
            } elseif ($item->section_id === '4') {
                $html .= view('sections.section_04', compact('items', 'tenView', 'item'))->render();
            } elseif ($item->section_id === '5') {
                $html .= view('sections.section_05', compact('items', 'tenView'))->render();
            } elseif ($item->section_id === '6') {
                $html .= view('sections.section_06', compact('items', 'tenView'))->render();
            }
        }

        return $html;
    }
}
