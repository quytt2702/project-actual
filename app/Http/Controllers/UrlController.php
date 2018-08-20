<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;

use App\Entities\Url;
use App\Entities\CongTacVien;
use App\Entities\Admin\CaiDatNgonNgu;
use App\Entities\Landing\LandingTheme;
use App\Repositories\Contracts\NgonNguRepository;
use App\Repositories\Contracts\Admin\CaiDatNgonNguRepository;
use App\Strategies\PageRendering\DangKyRenderer;
use App\Strategies\PageRendering\SanPhamRenderer;
use App\Strategies\PageRendering\GioHangRenderer;
use App\Strategies\PageRendering\BaiVietRenderer;
use App\Strategies\PageRendering\DangNhapRenderer;
use App\Strategies\PageRendering\ThongTinWebRenderer;
use App\Strategies\PageRendering\LandingPageRenderer;
use App\Strategies\PageRendering\ThuongMaiDienTuRenderer;
use App\Strategies\PageRendering\ChuyenMucSanPhamRenderer;
use App\Strategies\PageRendering\ChuyenMucBaiVietRenderer;

class UrlController extends Controller
{
    protected $ngonNgu;
    protected $caiDatNgonNgu;
    protected $is_trang_chu = false;

    public function __construct(
        NgonNguRepository $ngonNgu,
        CaiDatNgonNguRepository $caiDatNgonNgu
    ) {
        $this->ngonNgu       = $ngonNgu;
        $this->caiDatNgonNgu = $caiDatNgonNgu;
    }

    public function navigate(Request $request, $url)
    {
        if ($url === '') {
            $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu(1);
            $url = $caiDatNgonNgu->link_trang_chu;
            $this->is_trang_chu = true;
        }

        $url = Url::where('url_url', $url)->first();

        if (empty($url)) {
            return redirect('/');
        }

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($url->id_ngon_ngu);
        $html          = '';

        // Xu Ly ref cong tac vien
        if ($request->has('ref')) {
            $hasCTV = CongTacVien::where('txid', $request->ref)->count() > 0;

            if ($hasCTV) {
                Cookie::queue('ctvid', $request->ref);
            }

            return redirect($url->url_url);
        }

        if ($url->url_ten_loai === Url::TEN_LOAI['THONG_TIN_WEB']) {
            $html = app(ThongTinWebRenderer::class)->render($url->url_noi_dung);
        } elseif ($url->url_ten_loai === Url::TEN_LOAI['LANDING_PAGE']) {
            return app(LandingPageRenderer::class)->render($url);
        } elseif ($url->url_ten_loai === Url::TEN_LOAI['TMDT']) {
            $html = app(ThuongMaiDienTuRenderer::class)->render($request, $url);
        } elseif ($url->url_ten_loai === Url::TEN_LOAI['SAN_PHAM']) {
            $html = app(SanPhamRenderer::class)->render($request, $url);
        } elseif ($url->url_ten_loai === Url::TEN_LOAI['CM_SAN_PHAM']) {
            $html = app(ChuyenMucSanPhamRenderer::class)->render($request, $url);
        } elseif ($url->url_ten_loai === Url::TEN_LOAI['BAI_VIET']) {
            $html = app(BaiVietRenderer::class)->render($request, $url);
        } elseif ($url->url_ten_loai === Url::TEN_LOAI['CM_BAI_VIET']) {
            $html = app(ChuyenMucBaiVietRenderer::class)->render($request, $url);
        } elseif ($url->url_ten_loai === Url::TEN_LOAI['DEFAULT']) {
            if ($url->url_url === 'gio-hang') {
                $html = app(GioHangRenderer::class)->render($request, $url);
            } elseif ($url->url_url === 'dang-nhap') {
                $html = app(DangNhapRenderer::class)->render();
            } elseif ($url->url_url === 'dang-ky') {
                $html = app(DangKyRenderer::class)->render();
            }
        }

        if ($html !== '') {
            if ($this->is_trang_chu && $caiDatNgonNgu->is_slider === CaiDatNgonNgu::IS_SLIDER['YES']) {
                $noiDungSlider  = json_decode($caiDatNgonNgu->noi_dung_slider);
                if (!empty($noiDungSlider) || $noiDungSlider !== [] && $noiDungSlider !== '') {
                    $html_trang_chu = view('sections.layouts.partials.slide', compact('noiDungSlider'))->render();
                    $html           = $html_trang_chu . $html;
                }
            }
            return $this->viewPage($request, $url, $html, $caiDatNgonNgu);
        }

        return abort(404);
    }

    public function getFooter($caiDatNgonNgu)
    {
        return view('sections.layouts.partials.footer_view', compact('caiDatNgonNgu'))->render();
    }

    public function getMenuDoc($caiDatNgonNgu)
    {
        $menu_doc       = json_decode($caiDatNgonNgu->menu_doc);
        $ten_menu_doc   = $caiDatNgonNgu->ten_menu_doc;

        return view('sections.layouts.partials.menu_doc', compact('menu_doc', 'ten_menu_doc'))->render();
    }

    public function getMenuNgang($caiDatNgonNgu, $menuNgang)
    {
        return view('sections.layouts.partials.menu_ngang', compact('menuNgang'));
    }

    public function getMenuNgangMobile($caiDatNgonNgu, $menuNgang, $ngonNgu)
    {
        return view('sections.layouts.partials.menu_ngang_mobile', compact('caiDatNgonNgu', 'menuNgang', 'ngonNgu'));
    }

    public function viewPage($request, $url, $html, $caiDatNgonNgu)
    {
        $ngonNgu           = $this->ngonNgu->getIsOpenNotVietNam();
        $menuNgang         = json_decode(json_decode($caiDatNgonNgu->menu_ngang));
        $menu_doc          = $this->getMenuDoc($caiDatNgonNgu);
        $menu_ngang        = $this->getMenuNgang($caiDatNgonNgu, $menuNgang);
        $menu_ngang_mobile = $this->getMenuNgangMobile($caiDatNgonNgu, $menuNgang, $ngonNgu);
        $footer            = $this->getFooter($caiDatNgonNgu);

        $listSanPham       = json_decode($request->cookie('list_san_pham'));
        $listSanPhamCookie = app(\App\Http\Controllers\GioHangController::class)->listSanPhamCookie($listSanPham);

        return view('sections.layouts.view', compact('html', 'menu_doc', 'footer', 'menu_ngang', 'menu_ngang_mobile', 'caiDatNgonNgu', 'listSanPhamCookie', 'ngonNgu'));
    }
}
