<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\PhanTramThuongDaiLyRepository;
use App\Validators\Admin\PhanTramThuongDaiLy\StorePhanTramThuongDaiLyValidator;
use App\Validators\Admin\PhanTramThuongDaiLy\UpdatePhanTramThuongDaiLyValidator;
use App\Validators\Admin\PhanTramThuongDaiLy\DestroyPhanTramThuongDaiLyValidator;

class PhanTramThuongDaiLyController extends Controller
{
    protected $phanTramThuongDaiLy;

    public function __construct(PhanTramThuongDaiLyRepository $phanTramThuongDaiLy)
    {
        $this->phanTramThuongDaiLy = $phanTramThuongDaiLy;
    }

    public function index(Request $request)
    {
        return view('admin.phan_tram_thuong_dai_ly.index');
    }

    public function table(Request $request)
    {
        $phanTramThuongDaiLy = $this->phanTramThuongDaiLy->all();

        return view('admin.phan_tram_thuong_dai_ly.partials.body-table', compact('phanTramThuongDaiLy'));
    }

    public function store(Request $request, StorePhanTramThuongDaiLyValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        $check_duoi = $this->phanTramThuongDaiLy->findMucYeuCau($data['muc_yeu_cau_duoi']);
        $check_tren = $this->phanTramThuongDaiLy->findMucYeuCau($data['muc_yeu_cau_tren']);

        if ($data['muc_yeu_cau_duoi'] > $data['muc_yeu_cau_tren']) {
            return return_error('Mức yêu cầu trên phải lớn hơn mức yêu cầu dưới!.');
        }

        if (!empty($check_duoi)) {
            return return_error('Mức yêu cầu dưới của bạn đã nằm trong điều kiện khác!.');
        }

        if (!empty($check_tren)) {
            return return_error('Mức yêu cầu trên của bạn đã nằm trong điều kiện khác!.');
        }

        // Process
        $this->phanTramThuongDaiLy->create([
            'muc_yeu_cau_duoi' => $data['muc_yeu_cau_duoi'],
            'muc_yeu_cau_tren' => $data['muc_yeu_cau_tren'],
            'phan_tram_thuong' => $data['phan_tram_thuong'],
        ]);

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function destroy(Request $request, $id, DestroyPhanTramThuongDaiLyValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $phanTramThuongDaiLy = $this->phanTramThuongDaiLy->find($id);
        $phanTramThuongDaiLy->delete();

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }

    public function editModal(Request $request, $id, DestroyPhanTramThuongDaiLyValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $phanTramThuongDaiLy = $this->phanTramThuongDaiLy->find($id);

        return view('admin.phan_tram_thuong_dai_ly.partials.change-modal', compact('phanTramThuongDaiLy'));
    }

    public function update(Request $request, $id, UpdatePhanTramThuongDaiLyValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $phanTramThuongDaiLy = $this->phanTramThuongDaiLy->find($id);
        $phanTramThuongDaiLy->muc_yeu_cau_duoi = $data['muc_yeu_cau_duoi'];
        $phanTramThuongDaiLy->muc_yeu_cau_tren = $data['muc_yeu_cau_tren'];
        $phanTramThuongDaiLy->phan_tram_thuong = $data['phan_tram_thuong'];
        $phanTramThuongDaiLy->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
