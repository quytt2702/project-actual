<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\CongTacVienRepository;

class DaiLyCuaToiController extends Controller
{
    protected $congTacVien;
    protected $paginate = 10;

    public function __construct(CongTacVienRepository $congTacVien)
    {
        $this->congTacVien = $congTacVien;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.dai_ly_cua_toi.index');
    }

    public function table(Request $request, $option)
    {
        $congTacVien = [];
        $user = Auth::guard('cong_tac_vien')->user();

        if ($option === "1") { // Lấy danh sách CTV đã xác thực và có doanh thu bởi đại lý
            $congTacVien = $this->congTacVien->getDaXacThucVaCoDoanhThuBoiDaiLy($user, $this->paginate);
        } else { // Lấy danh sách CTV đã xác thực
            $congTacVien = $this->congTacVien->getXacThuc($user, $this->paginate);
        }

        return view('cong_tac_vien.dai_ly_cua_toi.partials.table', compact('congTacVien'));
    }

    public function getSearch(Request $request, $option)
    {
        $search = $request->input_search;

        $congTacVien = [];
        $user = Auth::guard('cong_tac_vien')->user();

        if ($option === "1") { // Lấy danh sách CTV đã xác thực và có doanh thu bởi đại lý
            $congTacVien = $this->congTacVien->getDaXacThucVaCoDoanhThuBoiDaiLyWithSearch($user, $search, $this->paginate);
        } else { // Lấy danh sách CTV đã xác thực và có doanh thu
            $congTacVien = $this->congTacVien->getDaXacThucVaCoDoanhThuWithSearch($search, $this->paginate);
        }

        return view('cong_tac_vien.dai_ly_cua_toi.partials.table', compact('congTacVien'));
    }
}
