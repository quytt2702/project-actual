<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkGioiThieuController extends Controller
{
    public function index(Request $request)
    {
        $app_url = (env('APP_URL') === 'http://localhost') ? 'http://localhost:8000/' : env('APP_URL');
        $link = $app_url . 'cong-tac-vien/register?ref=' . Auth::guard('cong_tac_vien')->user()->txid;

        return view('cong_tac_vien.link_gioi_thieu.index', compact('link'));
    }
}
