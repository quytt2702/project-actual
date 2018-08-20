<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\CongTacVienRepository;

class NguoiDungLienKetController extends Controller
{
    protected $congTacVien;
    protected $paginate = 10;

    public function __construct(CongTacVienRepository $congTacVien)
    {
        $this->congTacVien = $congTacVien;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.nguoi_dung_lien_ket.index');
    }

    public function table(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();
        $nguoiDungLienKet = $this->congTacVien->getByEmailGioiThieu($user->email, $this->paginate);

        return view('cong_tac_vien.nguoi_dung_lien_ket.partials.body-table', compact('nguoiDungLienKet'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $user = Auth::guard('cong_tac_vien')->user();
        $nguoiDungLienKet = $this->congTacVien->getByEmailGioiThieuWithSearch($user->email, $search, $this->paginate);

        return view('cong_tac_vien.nguoi_dung_lien_ket.partials.body-table', compact('nguoiDungLienKet'));
    }
}
