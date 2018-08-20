<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\CongTacVien;
use App\Repositories\Contracts\CongTacVienRepository;
use App\Validators\Admin\CongTacVien\EmailCongTacVienValidator;

class NangCapThanhDaiLyController extends Controller
{
    protected $congTacVien;
    protected $paginate = 10;

    public function __construct(CongTacVienRepository $congTacVien)
    {
        $this->congTacVien = $congTacVien;
    }

    public function index(Request $request)
    {
        return view('admin.nang_cap_thanh_dai_ly.index');
    }

    public function table(Request $request)
    {
        $congTacVien = $this->congTacVien->getCongTacVienWithNganHang($this->paginate);

        return view('admin.nang_cap_thanh_dai_ly.partials.body-table', compact('congTacVien'));
    }

    public function nangCap(Request $request, $email, EmailCongTacVienValidator $validator)
    {
        // Validate
        $data['email'] = $email;
        $validator->with($data)->passesOrFail();

        $congTacVien = $this->congTacVien->findByEmail($email);
        $congTacVien->is_dai_ly = CongTacVien::IS_DAI_LY['YES'];
        $congTacVien->email_dai_ly_quan_ly = $email;
        $congTacVien->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $congTacVien = $this->congTacVien->getCongTacVienWithNganHangWithSearch($search, $this->paginate);

        return view('admin.nang_cap_thanh_dai_ly.partials.body-table', compact('congTacVien'));
    }
}
