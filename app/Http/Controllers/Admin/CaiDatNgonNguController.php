<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Admin\CaiDatNgonNgu;
use App\Repositories\Contracts\UrlRepository;
use App\Repositories\Contracts\NgonNguRepository;
use App\Repositories\Contracts\Admin\CaiDatNgonNguRepository;
use App\Validators\Admin\CaiDatNgonNgu\CaiDatNgonNguValidator;
use App\Validators\Admin\CaiDatNgonNgu\ShowCaiDatNgonNguValidator;
use App\Validators\Admin\CaiDatNgonNgu\SliderCaiDatNgonNguValidator;
use App\Validators\Admin\CaiDatNgonNgu\UpdateCaiDatNgonNguValidator;
use App\Validators\Admin\CaiDatNgonNgu\DestroyCaiDatNgonNguValidator;

class CaiDatNgonNguController extends Controller
{
    protected $url;
    protected $ngonNgu;
    protected $caiDatNgonNgu;

    public function __construct(
        UrlRepository $url,
        NgonNguRepository $ngonNgu,
        CaiDatNgonNguRepository $caiDatNgonNgu
    ) {
        $this->url           = $url;
        $this->ngonNgu       = $ngonNgu;
        $this->caiDatNgonNgu = $caiDatNgonNgu;
    }

    public function index(Request $request)
    {
        $ngonNgu = $this->ngonNgu->getIsOpen();

        return view('admin.cai_dat_ngon_ngu.index', compact('ngonNgu'));
    }

    public function table(Request $request, $id_ngon_ngu, ShowCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = compact('id_ngon_ngu');
        $validator->with($data)->passesOrFail();

        // Process
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        return view('admin.cai_dat_ngon_ngu.partials.cai_dat_ngon_ngu_body', compact('caiDatNgonNgu'));
    }

    public function edit(Request $request, $id_ngon_ngu, UpdateCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $ngonNgu = $this->ngonNgu->findByIdIsOpen($id_ngon_ngu);
        if (empty($ngonNgu)) {
            return validate_errors(['Trường id ngôn ngữ không đúng']);
        }

        // Process
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $caiDatNgonNgu->tieu_de_trang_web = $data['tieu_de_trang_web'];
        $caiDatNgonNgu->sdt               = $data['sdt'];
        $caiDatNgonNgu->hotline           = $data['hotline'];
        $caiDatNgonNgu->weibo             = $data['weibo'];
        $caiDatNgonNgu->chat_js           = $data['chat_js'];
        $caiDatNgonNgu->facebook          = $data['facebook'];
        $caiDatNgonNgu->twitter           = $data['twitter'];
        $caiDatNgonNgu->instagram         = $data['instagram'];
        $caiDatNgonNgu->youtube           = $data['youtube'];
        $caiDatNgonNgu->vimeo             = $data['vimeo'];
        $caiDatNgonNgu->google_plus       = $data['google_plus'];
        $caiDatNgonNgu->don_vi_tinh       = $data['don_vi_tinh'];
        $caiDatNgonNgu->don_vi_hien_thi   = $data['don_vi_hien_thi'];
        $caiDatNgonNgu->don_hang_dau      = $data['don_hang_dau'];
        $caiDatNgonNgu->don_hang_sau      = $data['don_hang_sau'];
        $caiDatNgonNgu->ti_gia_milk       = $data['ti_gia_milk'];
        $caiDatNgonNgu->logo_web          = $data['logo_web'];
        $caiDatNgonNgu->email             = $data['email'];
        $caiDatNgonNgu->loai_tieu_de_web  = ($data['loai_tieu_de_web'] == 0) ? 'CHU' : 'HINH';
        $caiDatNgonNgu->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function searchUrl(Request $request, $key)
    {
        if ($key === '') {
            return [];
        }

        $urls = $this->url->searchUrl($key)->toArray();

        return count($urls) > 0 ? $urls:[];
    }

    public function storeMenuDoc(Request $request, $id_ngon_ngu, CaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $url = $this->url->findByUrl($data['url_co_san']);
        if (empty($url)) {
            return return_error('Url không tìm thấy trong hệ thống');
        }

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        if (empty($caiDatNgonNgu->menu_doc)) {
            $caiDatNgonNgu->menu_doc = json_encode([$data]);
        } else {
            $menuDoc = json_decode($caiDatNgonNgu->menu_doc);

            foreach ($menuDoc as $item) {
                if ($item->url_co_san === $data['url_co_san']) {
                    return return_error('Url bị trùng trong menu');
                }
            }

            $menuDoc[] = $data;
            $caiDatNgonNgu->menu_doc = json_encode($menuDoc);
        }

        $caiDatNgonNgu->save();
        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function storeMenuNgang(Request $request, $id_ngon_ngu, DestroyCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        // Validate here (ten_hien_thi !== '')

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $caiDatNgonNgu->menu_ngang = json_encode($data['noi_dung']);
        $caiDatNgonNgu->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function menuDoc(Request $request, $id_ngon_ngu, DestroyCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $menuDoc = empty($caiDatNgonNgu->menu_doc) ? [] : json_decode($caiDatNgonNgu->menu_doc);

        return view('admin.cai_dat_ngon_ngu.partials.menu_doc_body', compact('menuDoc'));
    }

    public function menuNgang(Request $request, $id_ngon_ngu, DestroyCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $menuNgang = empty($caiDatNgonNgu->menu_ngang) ? [] : json_decode($caiDatNgonNgu->menu_ngang);

        return $menuNgang;
    }

    public function xoaMenuDoc(Request $request, $id_ngon_ngu, $url, DestroyCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $menuDoc = json_decode($caiDatNgonNgu->menu_doc);

        // Tiến hành xoá
        $newMenu = [];
        foreach ($menuDoc as $item) {
            if ($item->url_co_san !== $url) {
                $newMenu[] = $item;
            }
        }

        $caiDatNgonNgu->menu_doc = json_encode($newMenu);
        $caiDatNgonNgu->save();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function storeThongSoFooter(Request $request, $id_ngon_ngu, DestroyCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        if ($data['link_tieu_de_footer'] != '') {
            $url = $this->url->findByUrl($data['link_tieu_de_footer']);

            if (empty($url)) {
                return return_error('Url không tìm thấy trong hệ thống');
            }
        }

        $data = $request->all();
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $caiDatNgonNgu->mo_ta_ngan_footer = $data['mo_ta_ngan_footer'];
        $caiDatNgonNgu->dia_chi_footer = $data['dia_chi_footer'];
        $caiDatNgonNgu->link_tieu_de_footer = $data['link_tieu_de_footer'];
        $caiDatNgonNgu->sdt_footer = $data['sdt_footer'];
        $caiDatNgonNgu->tieu_de_footer = $data['tieu_de_footer'];
        $caiDatNgonNgu->tieu_de_menu_01_footer = $data['tieu_de_menu_01_footer'];
        $caiDatNgonNgu->tieu_de_menu_02_footer = $data['tieu_de_menu_02_footer'];
        $caiDatNgonNgu->tieu_de_menu_03_footer = $data['tieu_de_menu_03_footer'];
        $caiDatNgonNgu->save();
        return return_message('toastr', 'success', 'Đã lưu thông số footer thành công');
    }

    public function storeNoiDungFooter(Request $request, $id_ngon_ngu, $menu, CaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $url = $this->url->findByUrl($data['url']);
        if (empty($url)) {
            return return_error('Url không tìm thấy trong hệ thống');
        }

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);

        if ($menu === '1') {
            if (empty($caiDatNgonNgu->noi_dung_menu_01_body) || $caiDatNgonNgu->noi_dung_menu_01_body === '') {
                $caiDatNgonNgu->noi_dung_menu_01_body = json_encode([$data]);
            } else {
                $noiDung = json_decode($caiDatNgonNgu->noi_dung_menu_01_body);

                foreach ($noiDung as $item) {
                    if ($item->url === $data['url']) {
                        return return_error('Url bị trùng trong menu');
                    }
                }

                $noiDung[] = $data;
                $caiDatNgonNgu->noi_dung_menu_01_body = json_encode($noiDung);
            }
        } elseif ($menu === '2') {
            if (empty($caiDatNgonNgu->noi_dung_menu_02_body) || $caiDatNgonNgu->noi_dung_menu_02_body === '') {
                $caiDatNgonNgu->noi_dung_menu_02_body = json_encode([$data]);
            } else {
                $noiDung = json_decode($caiDatNgonNgu->noi_dung_menu_02_body);

                foreach ($noiDung as $item) {
                    if ($item->url === $data['url']) {
                        return return_error('Url bị trùng trong menu');
                    }
                }

                $noiDung[] = $data;
                $caiDatNgonNgu->noi_dung_menu_02_body = json_encode($noiDung);
            }
        } else {
            if (empty($caiDatNgonNgu->noi_dung_menu_03_body) || $caiDatNgonNgu->noi_dung_menu_03_body === '') {
                $caiDatNgonNgu->noi_dung_menu_03_body = json_encode([$data]);
            } else {
                $noiDung = json_decode($caiDatNgonNgu->noi_dung_menu_03_body);

                foreach ($noiDung as $item) {
                    if ($item->url === $data['url']) {
                        return return_error('Url bị trùng trong menu');
                    }
                }

                $noiDung[] = $data;
                $caiDatNgonNgu->noi_dung_menu_03_body = json_encode($noiDung);
            }
        }

        $caiDatNgonNgu->save();

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function noiDungMenuFooter(Request $request, $id_ngon_ngu, $menu, DestroyCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);

        if ($menu === '1') {
            $noiDungMenu01 = empty($caiDatNgonNgu->noi_dung_menu_01_body) ? [] : json_decode($caiDatNgonNgu->noi_dung_menu_01_body);

            return view('admin.cai_dat_ngon_ngu.partials.footer.noi_dung_menu_01_body', compact('noiDungMenu01'));
        } elseif ($menu === '2') {
            $noiDungMenu02 = empty($caiDatNgonNgu->noi_dung_menu_02_body) ? [] : json_decode($caiDatNgonNgu->noi_dung_menu_02_body);

            return view('admin.cai_dat_ngon_ngu.partials.footer.noi_dung_menu_02_body', compact('noiDungMenu02'));
        } else {
            $noiDungMenu03 = empty($caiDatNgonNgu->noi_dung_menu_03_body) ? [] : json_decode($caiDatNgonNgu->noi_dung_menu_03_body);

            return view('admin.cai_dat_ngon_ngu.partials.footer.noi_dung_menu_03_body', compact('noiDungMenu03'));
        }
    }

    public function xoaMenuFooter(Request $request, $id_ngon_ngu, $menu, $url)
    {
        // Validate
        $data = $request->all();
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);


        if ($menu === '1') {
            $noiDung = json_decode($caiDatNgonNgu->noi_dung_menu_01_body);

            // Tiến hành xoá
            $newNoiDung = [];
            foreach ($noiDung as $item) {
                if ($item->url !== $url) {
                    $newNoiDung[] = $item;
                }
            }

            $caiDatNgonNgu->noi_dung_menu_01_body = json_encode($newNoiDung);
        } elseif ($menu === '2') {
            $noiDung = json_decode($caiDatNgonNgu->noi_dung_menu_02_body);
            // Tiến hành xoá
            $newNoiDung = [];
            foreach ($noiDung as $item) {
                if ($item->url !== $url) {
                    $newNoiDung[] = $item;
                }
            }

            $caiDatNgonNgu->noi_dung_menu_02_body = json_encode($newNoiDung);
        } else {
            $noiDung = json_decode($caiDatNgonNgu->noi_dung_menu_03_body);
            // Tiến hành xoá
            $newNoiDung = [];
            foreach ($noiDung as $item) {
                if ($item->url !== $url) {
                    $newNoiDung[] = $item;
                }
            }

            $caiDatNgonNgu->noi_dung_menu_03_body = json_encode($newNoiDung);
        }

        $caiDatNgonNgu->save();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function storeTenMenuDoc(Request $request, $id_ngon_ngu, DestroyCaiDatNgonNguValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $data = $request->all();
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);

        $caiDatNgonNgu->ten_menu_doc = $data['ten_menu_doc'];
        $caiDatNgonNgu->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function slider(Request $request, $id_ngon_ngu)
    {
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $sliders = empty($caiDatNgonNgu->noi_dung_slider) ? [] : json_decode($caiDatNgonNgu->noi_dung_slider);
        return view('admin.cai_dat_ngon_ngu.partials.slider_body', compact('sliders', 'caiDatNgonNgu'));
    }

    public function storeSlider(Request $request, $id_ngon_ngu, SliderCaiDatNgonNguValidator $validator)
    {
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);

        $url = $this->url->findByUrl($data['url_slider']);
        if (empty($url)) {
            return return_error('Url không tìm thấy trong hệ thống');
        }

        if (empty($caiDatNgonNgu->noi_dung_slider)) {
            $noi_dung_slider = [
                'ten_hien_thi' => $data['ten_hien_thi'],
                'url_slider'         => $data['url_slider'],
                'image'        => $data['image'],
            ];
            $caiDatNgonNgu->noi_dung_slider = json_encode([$noi_dung_slider]);
            $caiDatNgonNgu->save();
        } else {
            $noi_dung_slider = json_decode($caiDatNgonNgu->noi_dung_slider);
            foreach ($noi_dung_slider as $item) {
                if ($item->url_slider == $request->url_slider) {
                    return return_error('Url bị trùng trong slider');
                }
            }
            $noi_dung_slider[] = $request->all();

            $slider = json_encode($noi_dung_slider);
            $caiDatNgonNgu->noi_dung_slider = $slider;

            $caiDatNgonNgu->save();
        }

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function xoaSlider(Request $request, $id_ngon_ngu, $url)
    {
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $noiDungsliders = json_decode($caiDatNgonNgu->noi_dung_slider);

        $newNoiDungsliders = [];

        foreach ($noiDungsliders as $noiDungSlider) {
            if ($noiDungSlider->url_slider != $url) {
                $newNoiDungsliders[] = $noiDungSlider;
            }
        }

        $caiDatNgonNgu->noi_dung_slider = json_encode($newNoiDungsliders);

        $caiDatNgonNgu->save();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function editSlider(Request $request, $id_ngon_ngu, DestroyCaiDatNgonNguValidator $validator)
    {
        $data = array_merge($request->all(), compact('id_ngon_ngu'));
        $validator->with($data)->passesOrFail();
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($id_ngon_ngu);
        $caiDatNgonNgu->is_slider = $data['is_slider'] ? CaiDatNgonNgu::IS_SLIDER['YES'] : CaiDatNgonNgu::IS_SLIDER['NO'];
        $caiDatNgonNgu->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
