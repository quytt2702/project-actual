<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\LogHoaDonNhapHang;
use App\Validators\LogHoaDonNhapHangValidator;
use App\Repositories\Contracts\LogHoaDonNhapHangRepository;

class LogHoaDonNhapHangRepositoryEloquent extends BaseRepository implements LogHoaDonNhapHangRepository
{
    public function model()
    {
        return LogHoaDonNhapHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findById($id)
    {
        return $this->model->findById('id', $id)->first();
    }

    public function getByIdHoaDonNhapHang($id_hoa_don_nhap_hang)
    {
        return $this->model->where('id_hoa_don_nhap_hang', $id_hoa_don_nhap_hang)->get();
    }

    public function getByNgayThayDoiWithNhaCungCapWithSanPham($ngay_thay_doi)
    {
        return $this->model
            ->where('log_hoa_don_nhap_hang.ngay_thay_doi', $ngay_thay_doi)
            ->join('nha_cung_cap', 'nha_cung_cap.id', 'log_hoa_don_nhap_hang.id_nha_cung_cap')
            ->join('san_pham', 'san_pham.id', 'log_hoa_don_nhap_hang.id_san_pham')
            ->get();
    }
}
