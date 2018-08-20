<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\NgonNgu;
use App\Entities\ChuyenMucSanPham;
use App\Validators\ChuyenMucSanPhamValidator;
use App\Repositories\Contracts\ChuyenMucSanPhamRepository;

class ChuyenMucSanPhamRepositoryEloquent extends BaseRepository implements ChuyenMucSanPhamRepository
{
    public function model()
    {
        return ChuyenMucSanPham::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
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
            ->where('chuyen_muc_san_pham_url', $url)
            ->first();
    }

    public function allWithNgonNgu()
    {
        return $this->model
            ->join('ngon_ngu', 'ngon_ngu.id', 'chuyen_muc_san_pham.chuyen_muc_san_pham_id_ngon_ngu')
            ->where('ngon_ngu.is_open', NgonNgu::IS_OPEN['YES'])
            ->select('chuyen_muc_san_pham.*', 'chuyen_muc_san_pham.chuyen_muc_san_pham_url as url', 'ngon_ngu.id as ngon_ngu_id', 'ngon_ngu.ten')
            ->get();
    }

    public function allWithNgonNguActiveVaChuyenMucSanPhamActive()
    {
        return $this->model
            ->where('chuyen_muc_san_pham.chuyen_muc_san_pham_is_active', ChuyenMucSanPham::IS_ACTIVE['YES'])
            ->join('ngon_ngu', 'ngon_ngu.id', 'chuyen_muc_san_pham.chuyen_muc_san_pham_id_ngon_ngu')
            ->where('ngon_ngu.is_open', NgonNgu::IS_OPEN['YES'])
            ->select('chuyen_muc_san_pham.*', 'ngon_ngu.id as ngon_ngu_id', 'ngon_ngu.ten')
            ->get();
    }
}
