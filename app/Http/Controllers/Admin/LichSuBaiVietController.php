<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Entities\BaiViet;
use App\Repositories\Contracts\BaiVietRepository;
use App\Repositories\Contracts\ChuyenMucRepository;
use App\Repositories\Contracts\LichSuBaiVietRepository;
use App\Validators\Admin\LichSuBaiViet\IdLichSuBaiVietValidator;

class LichSuBaiVietController extends Controller
{
    protected $baiViet;
    protected $chuyenMuc;
    protected $lichSuBaiViet;

    public function __construct(
        BaiVietRepository $baiViet,
        ChuyenMucRepository $chuyenMuc,
        LichSuBaiVietRepository $lichSuBaiViet
    ) {
        $this->baiViet       = $baiViet;
        $this->chuyenMuc     = $chuyenMuc;
        $this->lichSuBaiViet = $lichSuBaiViet;
    }

    public function index(Request $request, $id)
    {
        return view('admin.lich_su_bai_viet.index');
    }

    public function list(Request $request, $id)
    {
        // Validate
        $data['id'] = $id;

        // Process
        $lichSuBaiViet = $this->lichSuBaiViet->getByIdBaiViet($id);

        return view('admin.lich_su_bai_viet.partials.list', compact('lichSuBaiViet'));
    }

    public function show(Request $request, $id, IdLichSuBaiVietValidator $validator)
    {
        // Validate
        $data['id'] = $id;
        $validator->with($data)->passesOrFail();

        // Process
        $chuyenMuc     = $this->chuyenMuc->all();
        $lichSuBaiViet = $this->lichSuBaiViet->find($id);

        return view('admin.lich_su_bai_viet.show', compact('chuyenMuc', 'lichSuBaiViet'));
    }

    public function restore(Request $request, $id, IdLichSuBaiVietValidator $validator)
    {
        // Validate
        $data['id'] = $id;
        $validator->with($data)->passesOrFail();

        // Process
        $lichSuBaiViet = $this->lichSuBaiViet->find($id);

        // Cập nhật bài viết
        $baiViet = $this->baiViet->find($lichSuBaiViet->id_bai_viet);
        $baiViet->tieu_de           = $lichSuBaiViet->tieu_de;
        $baiViet->url               = $lichSuBaiViet->url;
        $baiViet->mo_ta_ngan        = $lichSuBaiViet->mo_ta_ngan;
        $baiViet->noi_dung          = $lichSuBaiViet->noi_dung;
        $baiViet->keyword           = $lichSuBaiViet->keyword;
        $baiViet->id_chuyen_muc     = $lichSuBaiViet->id_chuyen_muc;
        $baiViet->ten_chuyen_muc    = $lichSuBaiViet->ten_chuyen_muc;
        $baiViet->tags              = $lichSuBaiViet->tags;
        $baiViet->hinh_dai_dien     = $lichSuBaiViet->hinh_dai_dien;
        $baiViet->is_accept         = $lichSuBaiViet->is_accept;
        $baiViet->is_delete         = $lichSuBaiViet->is_delete;
        $baiViet->nguoi_tao         = $lichSuBaiViet->nguoi_tao;
        $baiViet->nguoi_cap_nhat    = $lichSuBaiViet->nguoi_cap_nhat;
        $baiViet->nguoi_duyet       = $lichSuBaiViet->nguoi_duyet;
        $baiViet->id_nguoi_tao      = $lichSuBaiViet->id_nguoi_tao;
        $baiViet->id_nguoi_cap_nhat = $lichSuBaiViet->id_nguoi_cap_nhat;
        $baiViet->save();

        // Thêm mới lịch sử bài viết
        $this->lichSuBaiViet->create([
            'id_bai_viet'       => $lichSuBaiViet->id_bai_viet,
            'tieu_de'           => $lichSuBaiViet->tieu_de,
            'url'               => $lichSuBaiViet->url,
            'mo_ta_ngan'        => $lichSuBaiViet->mo_ta_ngan,
            'noi_dung'          => $lichSuBaiViet->noi_dung,
            'keyword'           => $lichSuBaiViet->keyword,
            'id_chuyen_muc'     => $lichSuBaiViet->id_chuyen_muc,
            'ten_chuyen_muc'    => $lichSuBaiViet->ten_chuyen_muc,
            'tags'              => $lichSuBaiViet->tags,
            'hinh_dai_dien'     => $lichSuBaiViet->hinh_dai_dien,
            'is_accept'         => $lichSuBaiViet->is_accept,
            'is_delete'         => $lichSuBaiViet->is_delete,
            'nguoi_tao'         => $lichSuBaiViet->nguoi_tao,
            'nguoi_cap_nhat'    => $lichSuBaiViet->nguoi_cap_nhat,
            'nguoi_duyet'       => $lichSuBaiViet->nguoi_duyet,
            'thay_doi'          => 'Khôi phục từ bài viết [' . $id . ']',
            'id_nguoi_tao'      => $lichSuBaiViet->id_nguoi_tao,
            'id_nguoi_cap_nhat' => $lichSuBaiViet->id_nguoi_cap_nhat
        ]);

        return return_message('toastr', 'success', 'Bạn đã khôi phục thành công');
    }
}
