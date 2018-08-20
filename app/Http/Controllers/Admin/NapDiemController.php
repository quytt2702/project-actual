<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Uuid;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\CodeNapDiem;
use App\Repositories\Contracts\SoDiemRepository;
use App\Repositories\Contracts\CodeNapDiemRepository;
use App\Validators\Admin\NapDiem\CreateNapDiemValidator;
use App\Validators\Admin\NapDiem\DestroyNapDiemValidator;

class NapDiemController extends Controller
{
    protected $soDiem;
    protected $codeNapDiem;
    protected $paginate = 10;

    public function __construct(CodeNapDiemRepository $codeNapDiem, SoDiemRepository $soDiem)
    {
        $this->soDiem      = $soDiem;
        $this->codeNapDiem = $codeNapDiem;
    }

    public function index(Request $request)
    {
        $dot_tao_ma = $this->codeNapDiem->getAllDotTaoMa();
        $soDiem     = $this->soDiem->getAllKichHoat();

        return view('admin.nap_diem.index', compact('dot_tao_ma', 'soDiem'));
    }

    public function add(Request $request)
    {
        $soDiem = $this->soDiem->getAllKichHoat();

        return view('admin.nap_diem.add', compact('soDiem'));
    }

    public function table(Request $request)
    {
        $codeNapDiem = $this->codeNapDiem->getAllWithPaginate($this->paginate);

        return view('admin.nap_diem.partials.add_table', compact('codeNapDiem'));
    }

    public function store(Request $request, CreateNapDiemValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        $times = intval($data['so_luong_code']);

        $user = Auth::guard('admin')->user();

        for ($i = 0; $i < $times; $i++) {
            $hash = Uuid::generate(4)->string;
            $tmp = str_replace('-', '', $hash);
            $tmp_seri = substr($tmp, 0, 4) . '-' . substr($tmp, 4, 4) . '-' . substr($tmp, 8, 4) . '-' . substr($tmp, 12, 4);
            $tmp_ma_nap_tien = substr($tmp, 16, 4) . '-' . substr($tmp, 20, 4) . '-' . substr($tmp, 24, 4) . '-' . substr($tmp, 28, 4);
            $codeTaoDiem = [
                'so_diem'         => $data['so_diem'],
                'is_active'       => ($data['is_active'] === 'YES')? CodeNapDiem::IS_ACTIVE['YES']:CodeNapDiem::IS_ACTIVE['NO'],
                'hide_hash'       => $hash,
                'seri'            => $tmp_seri,
                'ma_nap_tien'     => $tmp_ma_nap_tien,
                'email_nguoi_tao' => $user->email,
                'dot_tao_ma'      => date("Hisdmy"),
            ];

            $this->codeNapDiem->create($codeTaoDiem);
        }

        return return_message('toastr', 'success', trans('notification.add.success'));
    }

    public function viewTable(Request $request, $dotTaoMa)
    {
        // Validate here dot tao ma
        $codeNapDiem = $this->codeNapDiem->getDotTaoMa($dotTaoMa);

        return view('admin.nap_diem.partials.add_table', compact('codeNapDiem'));
    }

    public function update(Request $request, $dotTaoMa)
    {
        // Validate here
        $data = $request->all();

        $this->codeNapDiem->update($dotTaoMa, $data);

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function kichHoat(Request $request, $id, DestroyNapDiemValidator $validator)
    {
        // Validate
        $data['id']             = $id;
        $validator->with($data)->passesOrFail();

        $codeNapDiem            = $this->codeNapDiem->find($id);
        $codeNapDiem->is_active = ($codeNapDiem->is_active === CodeNapDiem::IS_ACTIVE['YES']) ? CodeNapDiem::IS_ACTIVE['NO']:CodeNapDiem::IS_ACTIVE['YES'];
        $codeNapDiem->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $codeNapDiem = $this->codeNapDiem->getWithSearch($search, $this->paginate);

        return view('admin.nap_diem.partials.add_table', compact('codeNapDiem'));
    }
}
