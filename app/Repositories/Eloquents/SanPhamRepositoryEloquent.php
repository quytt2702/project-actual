<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\SanPham;
use App\Entities\HoaDonBanHang;
use App\Validators\SanPhamValidator;
use App\Repositories\Contracts\SanPhamRepository;

class SanPhamRepositoryEloquent extends BaseRepository implements SanPhamRepository
{
    public function model()
    {
        return SanPham::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function toKeyIds($sanPham)
    {
        $sanPhamIdKey = [];
        foreach ($sanPham as $item) {
            $sanPhamIdKey[$item->id] = $item;
        }

        return $sanPhamIdKey;
    }

    public function findById($id)
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }

    public function findByUrl($url)
    {
        return $this->model
            ->where('san_pham_url', $url)
            ->first();
    }

    public function getByIdChuyenMuc($id)
    {
        return $this->model
            ->where('san_pham_id_chuyen_muc', 'LIKE', '%"' .  $id . '"%')
            ->get();
    }

    public function findByIdWithCaiDatNgonNgu($id)
    {
        return $this->model
            ->where('san_pham.id', $id)
            ->join('cai_dat_ngon_ngu', 'cai_dat_ngon_ngu.id_ngon_ngu', 'san_pham.id_ngon_ngu')
            ->select('san_pham.*', 'san_pham.id as san_pham_id', 'cai_dat_ngon_ngu.*', 'cai_dat_ngon_ngu.id as cai_dat_ngon_ngu_id')
            ->first();
    }

    public function getByIdsWithChuyenMucWithCaiDatNgonNgu($ids)
    {
        return $this->model
            ->whereIn('san_pham.id', $ids)
            ->join('cai_dat_ngon_ngu', 'cai_dat_ngon_ngu.id_ngon_ngu', 'san_pham.id_ngon_ngu')
            ->select('san_pham.*', 'san_pham.id as san_pham_id', 'cai_dat_ngon_ngu.*', 'cai_dat_ngon_ngu.id as cai_dat_ngon_ngu_id')
            ->get();
    }

    public function getActive($paginate = null)
    {
        $model = $this->model
            ->where('san_pham_is_delete', SanPham::IS_DELETE['NO']);
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getTrash($paginate = null)
    {
        $model = $this->model
            ->where('san_pham_is_delete', SanPham::IS_DELETE['YES']);
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getAllSanPham($paginate = null)
    {
        $model = $this->model;
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getAllSanPhamWithChuyenMucWithCaiDatNgonNgu($paginate = null)
    {
        $model = $this->model
            ->join('cai_dat_ngon_ngu', 'cai_dat_ngon_ngu.id_ngon_ngu', 'san_pham.id_ngon_ngu')
            ->select('cai_dat_ngon_ngu.*', 'san_pham.*', 'san_pham.id as san_pham_id', 'cai_dat_ngon_ngu.id as cai_dat_ngon_ngu_id');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getActiveWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('san_pham_is_delete', SanPham::IS_DELETE['NO'])
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('san_pham.san_pham_ten', 'LIKE', '%' . $search . '%')
                ->orWhere('san_pham.san_pham_url', 'LIKE', '%' . $search . '%')
                ->orWhere('san_pham.san_pham_mo_ta', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getTrashWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('san_pham_is_delete', SanPham::IS_DELETE['YES'])
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('san_pham.san_pham_ten', 'LIKE', '%'.$search.'%')
                ->orWhere('san_pham.san_pham_url', 'LIKE', '%'.$search.'%')
                ->orWhere('san_pham.san_pham_mo_ta', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function allWithSearchWithChuyenMucWithCaiDatNgonNgu($search, $paginate = null)
    {
        $model = $this->model
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('san_pham.san_pham_ten', 'LIKE', '%'.$search.'%')
                ->orWhere('san_pham.san_pham_url', 'LIKE', '%'.$search.'%')
                ->orWhere('san_pham.san_pham_mo_ta', 'LIKE', '%'.$search.'%')
                ->orWhere('san_pham.san_pham_ma', 'LIKE', '%'.$search.'%')
                ->orWhere('san_pham.san_pham_gia_ban_thuc_te', 'LIKE', '%'.$search.'%');
            })
            ->join('cai_dat_ngon_ngu', 'cai_dat_ngon_ngu.id_ngon_ngu', 'san_pham.id_ngon_ngu');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDetail($id, $paginate = null)
    {
        $model = $this->model
            ->where('san_pham.id', $id)
            ->join('chi_tiet_hoa_don_ban_san_pham', 'san_pham.id', 'chi_tiet_hoa_don_ban_san_pham.id_san_pham')
            ->join('hoa_don_ban_hang', 'chi_tiet_hoa_don_ban_san_pham.id_hoa_don_ban_hang', 'hoa_don_ban_hang.id')
            ->whereIn('hoa_don_ban_hang.trang_thai', [HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN'], HoaDonBanHang::TRANG_THAI['THUC_HIEN_THANH_CONG']]);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getSearchDetail($id, $search, $paginate = null)
    {
        $model = $this->model
            ->where('san_pham.id', $id)
            ->join('chi_tiet_hoa_don_ban_san_pham', 'san_pham.id', 'chi_tiet_hoa_don_ban_san_pham.id_san_pham')
            ->join('hoa_don_ban_hang', 'chi_tiet_hoa_don_ban_san_pham.id_hoa_don_ban_hang', 'hoa_don_ban_hang.id')
            ->whereIn('hoa_don_ban_hang.trang_thai', [HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN'], HoaDonBanHang::TRANG_THAI['THUC_HIEN_THANH_CONG']])
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('hash', 'LIKE', "%{$search}%")
                ->orWhere('hoa_don_ban_hang.email_khach_hang_mua', 'LIKE', "%{$search}%");
            });


        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getSearch($key)
    {
        return $this->model
            ->orWhere('san_pham_ma', 'LIKE', '%' . $key . '%')
            ->orWhere('san_pham_ten', 'LIKE', '%' . $key . '%')
            ->orWhere('san_pham_url', 'LIKE', '%' . $key . '%')
            ->get();
    }

    public function getSearchSanPham($search, $paginate = null)
    {
        $model = $this->model
            ->orWhere('san_pham_ten', 'LIKE', "%{$search}%")
            ->orWhere('san_pham_url', 'LIKE', "%{$search}%");
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
