<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\CongTacVienRepository;
use App\Validators\Admin\CongTacVien\EmailCongTacVienValidator;

class DaiLyCTVController extends Controller
{
    protected $congTacVien;

    public function __construct(CongTacVienRepository $congTacVien)
    {
        $this->congTacVien  = $congTacVien;
    }

    public function index(Request $request)
    {
        $daiLy = $this->congTacVien->getDaiLy();

        return view('admin.dai_ly_ctv.index', compact('daiLy'));
    }

    public function getTab(Request $request, $email, $condition, EmailCongTacVienValidator $validator)
    {
        // Validate
        $data['email'] = $email;
        $validator->with($data)->passesOrFail();

        // Process
        $congTacVien = [];
        $trangThai = '';

        if ($condition === 'tab_01') {
            $trangThai = 'tab_01';
            $congTacVien = $this->congTacVien->getChuaCoQuanLy();
        } elseif ($condition === 'tab_02') {
            $trangThai = 'tab_02';
            $congTacVien = $this->congTacVien->getQuanLyBoiCongTacVienKhac($email);
        } else {
            $trangThai = 'tab_03';
            $congTacVien = $this->congTacVien->getQuanLyBoiToi($email);
        }

        return view('admin.dai_ly_ctv.partials.cong_tac_vien_table', compact('congTacVien', 'trangThai'));
    }

    public function update(Request $request, $email, $email_dai_ly, EmailCongTacVienValidator $validator)
    {
        // Validate
        $data['email'] = $email;
        $validator->with($data)->passesOrFail();

        // Process
        $congTacVien = $this->congTacVien->findByEmail($email);

        if (empty($congTacVien->email_dai_ly_quan_ly)) {
            $congTacVien->email_dai_ly_quan_ly = $email_dai_ly;
        } else {
            $congTacVien->email_dai_ly_quan_ly = null;
        }

        $congTacVien->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
