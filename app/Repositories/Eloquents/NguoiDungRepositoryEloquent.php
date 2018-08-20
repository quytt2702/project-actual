<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\NguoiDung;
use App\Validators\NguoiDungValidator;
use App\Repositories\Contracts\NguoiDungRepository;

class NguoiDungRepositoryEloquent extends BaseRepository implements NguoiDungRepository
{
    public function model()
    {
        return NguoiDung::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByTxid($txid)
    {
        return $this->model
            ->where('txid', $txid)
            ->where('is_delete', NguoiDung::IS_DELETE['NO'])
            ->first();
    }

    public function findByTxidWithNhomQuyenNganHang($txid)
    {
        return $this->model
            ->where('txid', $txid)
            ->where('is_delete', NguoiDung::IS_DELETE['NO'])
            ->join('nhom_quyen', 'nhom_quyen.id', 'nguoi_dung.id_nhom_quyen')
            ->join('ngan_hang', 'ngan_hang.id', 'nguoi_dung.id_ngan_hang')
            ->first();
    }

    public function allWithNhomQuyenNganHang($paginate = null)
    {
        $model = $this->model
            ->where('is_delete', NguoiDung::IS_DELETE['NO'])
            ->join('nhom_quyen', 'nhom_quyen.id', 'nguoi_dung.id_nhom_quyen')
            ->join('ngan_hang', 'ngan_hang.id', 'nguoi_dung.id_ngan_hang');
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function allWithNhomQuyenNganHangWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('is_delete', NguoiDung::IS_DELETE['NO'])
            ->join('nhom_quyen', 'nhom_quyen.id', 'nguoi_dung.id_nhom_quyen')
            ->join('ngan_hang', 'ngan_hang.id', 'nguoi_dung.id_ngan_hang')
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('nguoi_dung.dia_chi_hien_tai', 'LIKE', '%'.$search.'%')
                    ->orWhere('nguoi_dung.email', 'LIKE', '%'.$search.'%')
                    ->orWhere('nguoi_dung.ho_va_ten', 'LIKE', '%'.$search.'%')
                    ->orWhere('nguoi_dung.so_tai_khoan', 'LIKE', '%'.$search.'%')
                    ->orWhere('nguoi_dung.ten_chi_nhanh', 'LIKE', '%'.$search.'%')
                    ->orWhere('nguoi_dung.ten_chu_tai_khoan', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
