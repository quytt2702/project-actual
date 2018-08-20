<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\ChiTietHoaDonNhapSanPham;
use App\Validators\ChiTietHoaDonNhapSanPhamValidator;
use App\Repositories\Contracts\ChiTietHoaDonNhapSanPhamRepository;

class ChiTietHoaDonNhapSanPhamRepositoryEloquent extends BaseRepository implements ChiTietHoaDonNhapSanPhamRepository
{
    public function model()
    {
        return ChiTietHoaDonNhapSanPham::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByIdDonHangWithNhaCungCapVaSanPham($id_don_hang)
    {
        return $this->model
            ->where('id_hoa_don_nhap_san_pham', $id_don_hang)
            ->join('san_pham', 'san_pham.id', 'chi_tiet_hoa_don_nhap_san_pham.id_san_pham')
            ->join('nha_cung_cap', 'nha_cung_cap.id', 'chi_tiet_hoa_don_nhap_san_pham.id_nha_cung_cap')
            ->get();
    }

    public function getByIdHoaDonNhapSanPham($id_hoa_don_nhap_san_pham)
    {
        return $this->model
            ->where('id_hoa_don_nhap_san_pham', $id_hoa_don_nhap_san_pham)
            ->get();
    }

    public function deleteByIdHoaDonNhapSanPham($id_hoa_don_nhap_san_pham)
    {
        return $this->model
            ->where('id_hoa_don_nhap_san_pham', $id_hoa_don_nhap_san_pham)
            ->delete();
    }
}
