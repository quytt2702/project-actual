<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\UrlRepository;

class DanhSachLinkController extends Controller
{
    protected $url;
    protected $paginate = 10;

    public function __construct(UrlRepository $url)
    {
        $this->url = $url;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.danh_sach_link.index');
    }

    public function table(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $url = $this->url->showNewUrlCongTacVien($this->paginate);

        foreach ($url as $index => $item) {
            $url[$index]->url_url = env('APP_URL') . $item->url_url . '?ref=' . $user->txid;
        }

        return view('cong_tac_vien.danh_sach_link.partials.table', compact('url'));
    }
}
