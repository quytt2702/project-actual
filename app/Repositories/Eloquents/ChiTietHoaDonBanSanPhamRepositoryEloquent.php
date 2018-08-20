<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\ChiTietHoaDonBanSanPham;
use App\Validators\ChiTietHoaDonBanSanPhamValidator;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;

class ChiTietHoaDonBanSanPhamRepositoryEloquent extends BaseRepository implements ChiTietHoaDonBanSanPhamRepository
{
    public function model()
    {
        return ChiTietHoaDonBanSanPham::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getByIdHoaDonBanHang($idHoaDonBanHang)
    {
        return $this->model
            ->where('id_hoa_don_ban_hang', $idHoaDonBanHang)
            ->get();
    }

    public function getByIdHoaDonBanHangWithSanPham($idHoaDonBanHang)
    {
        return $this->model
            ->where('id_hoa_don_ban_hang', $idHoaDonBanHang)
            ->join('san_pham', 'san_pham.id', 'chi_tiet_hoa_don_ban_san_pham.id_san_pham')
            ->get();
    }

    public function deleteByIdHoaDonBanHangWithSanPham($idHoaDonBanHang)
    {
        return $this->model
            ->where('id_hoa_don_ban_hang', $idHoaDonBanHang)
            ->delete();
    }

    public function getChiTietHoaDonWithKhachHang($hash)
    {
        return $this->model
            ->where('hoa_don_ban_hang.hash', $hash)
            ->join('hoa_don_ban_hang', 'chi_tiet_hoa_don_ban_san_pham.id_hoa_don_ban_hang', 'hoa_don_ban_hang.id')
            ->join('san_pham', 'san_pham.id', 'chi_tiet_hoa_don_ban_san_pham.id_san_pham')
            ->select('san_pham.san_pham_ma', 'san_pham.san_pham_ten', 'chi_tiet_hoa_don_ban_san_pham.so_luong', 'chi_tiet_hoa_don_ban_san_pham.don_gia', 'chi_tiet_hoa_don_ban_san_pham.tong_tien_vnd')
            ->get();
    }
}
