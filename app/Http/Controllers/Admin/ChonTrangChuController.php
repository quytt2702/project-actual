<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\UrlRepository;
use App\Repositories\Contracts\Admin\CaiDatNgonNguRepository;

class ChonTrangChuController extends Controller
{
    protected $url;
    protected $caiDatNgonNgu;
    protected $paginate = 10;

    public function __construct(
        UrlRepository $url,
        CaiDatNgonNguRepository $caiDatNgonNgu
    ) {
        $this->url           = $url;
        $this->caiDatNgonNgu = $caiDatNgonNgu;
    }

    public function index(Request $request)
    {
        return view('admin.chon_trang_chu.index');
    }

    public function table(Request $request)
    {
        $urls = $this->url->getAll($this->paginate);

        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($urls[0]->id_ngon_ngu);
        $link_trang_chu = $caiDatNgonNgu->link_trang_chu;

        return view('admin.chon_trang_chu.partials.body-table', compact('urls', 'link_trang_chu'));
    }

    public function store(Request $request, $url)
    {
        $url = $this->url->findByUrl($url);

        if (!empty($url)) {
            $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($url->id_ngon_ngu);
            $caiDatNgonNgu->link_trang_chu = $url->url_url;
            $caiDatNgonNgu->save();

            return return_message('toastr', 'success', trans('notification.edit.success'));
        }

        return return_message('toastr', 'error', 'Có lỗi xảy ra');
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $urls = $this->url->getAllWithSearch($search, $this->paginate);
        $caiDatNgonNgu = $this->caiDatNgonNgu->findByIdNgonNgu($urls[0]->id_ngon_ngu);
        $link_trang_chu = $caiDatNgonNgu->link_trang_chu;

        return view('admin.chon_trang_chu.partials.body-table', compact('urls', 'link_trang_chu'));
    }
}
