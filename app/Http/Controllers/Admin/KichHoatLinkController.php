<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Url;
use App\Repositories\Contracts\UrlRepository;

class KichHoatLinkController extends Controller
{
    protected $url;
    protected $paginate = 10;

    public function __construct(UrlRepository $url)
    {
        $this->url = $url;
    }

    public function index(Request $request)
    {
        return view('admin.kich_hoat_link.index');
    }

    public function table(Request $request)
    {
        $url = $this->url->showUrlCongTacVien($this->paginate);

        return view('admin.kich_hoat_link.partials.table', compact('url'));
    }

    public function update(Request $request, $url)
    {
        $url = $this->url->findByUrl($url);

        $url->is_view_cong_tac_vien = ($url->is_view_cong_tac_vien === Url::IS_VIEW_CONG_TAC_VIEN['YES']) ? Url::IS_VIEW_CONG_TAC_VIEN['NO'] : Url::IS_VIEW_CONG_TAC_VIEN['YES'];
        $url->save();

        return return_message('toastr', 'success', 'Đã thay đổi trạng thái thành công');
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $url = $this->url->showUrlCongTacVienWithSearch($search, $this->paginate);

        return view('admin.kich_hoat_link.partials.table', compact('url'));
    }
}
