<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\HoaDonNhapHang;
use App\Validators\HoaDonNhapHangValidator;
use App\Repositories\Contracts\HoaDonNhapHangRepository;

class HoaDonNhapHangRepositoryEloquent extends BaseRepository implements HoaDonNhapHangRepository
{
    public function model()
    {
        return HoaDonNhapHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
