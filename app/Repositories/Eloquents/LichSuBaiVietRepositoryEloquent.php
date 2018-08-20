<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\LichSuBaiViet;
use App\Validators\LichSuBaiVietValidator;
use App\Repositories\Contracts\LichSuBaiVietRepository;

class LichSuBaiVietRepositoryEloquent extends BaseRepository implements LichSuBaiVietRepository
{
    public function model()
    {
        return LichSuBaiViet::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getByIdBaiViet($id_bai_viet)
    {
        return $this->model->where('id_bai_viet', $id_bai_viet)->get();
    }
}
