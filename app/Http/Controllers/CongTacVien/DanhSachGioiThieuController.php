<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\CongTacVienRepository;

class DanhSachGioiThieuController extends Controller
{
    protected $congTacVien;
    protected $paginate = 10;

    public function __construct(CongTacVienRepository $congTacVien)
    {
        $this->congTacVien = $congTacVien;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.danh_sach_gioi_thieu.index');
    }

    public function table(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();

        $congTacVien = $this->congTacVien->getByEmail($user->email, $this->paginate);

        return view('cong_tac_vien.danh_sach_gioi_thieu.partials.body-table', compact('congTacVien'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $user = Auth::guard('cong_tac_vien')->user();

        $congTacVien = $this->congTacVien->getByEmailVaChuaXacThucWithSearch($user->email, $search, $this->paginate);

        return view('cong_tac_vien.danh_sach_gioi_thieu.partials.body-table', compact('congTacVien'));
    }
}
