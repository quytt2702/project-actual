<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\District;
use App\Validators\DistrictValidator;
use App\Repositories\Contracts\DistrictRepository;

class DistrictRepositoryEloquent extends BaseRepository implements DistrictRepository
{
    public function model()
    {
        return District::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByThanhPhoId($thanhPhoId, $key)
    {
        return $this->model
            ->where('provinceid', $thanhPhoId)
            ->where('name', $key)
            ->get();
    }

    public function getDistrictByProvinceId($thanhPhoId)
    {
        return $this->model
            ->where('provinceid', $thanhPhoId)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function findQuanHuyenById($id)
    {
        return $this->model
            ->where('districtid', $id)
            ->first();
    }
}
