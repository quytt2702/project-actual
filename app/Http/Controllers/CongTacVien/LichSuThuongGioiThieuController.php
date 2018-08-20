<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\LogThuongGioiThieuRepository;

class LichSuThuongGioiThieuController extends Controller
{
    protected $logThuongGioiThieu;
    protected $paginate = 10;

    public function __construct(LogThuongGioiThieuRepository $logThuongGioiThieu)
    {
        $this->logThuongGioiThieu = $logThuongGioiThieu;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.lich_su_thuong_gioi_thieu.index');
    }

    public function table(Request $request)
    {
        $user = Auth::guard('cong_tac_vien')->user();

        $logThuongGioiThieu = $this->logThuongGioiThieu->getByEmail($user->email, $this->paginate);

        return view('cong_tac_vien.lich_su_thuong_gioi_thieu.partials.body-table', compact('logThuongGioiThieu'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $user = Auth::guard('cong_tac_vien')->user();

        $logThuongGioiThieu = $this->logThuongGioiThieu->getByEmailWithSearch($user->email, $search, $this->paginate);

        return view('cong_tac_vien.lich_su_thuong_gioi_thieu.partials.body-table', compact('logThuongGioiThieu'));
    }
}
