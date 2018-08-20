<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Ward;
use App\Validators\WardValidator;
use App\Repositories\Contracts\WardRepository;

class WardRepositoryEloquent extends BaseRepository implements WardRepository
{
    public function model()
    {
        return Ward::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByQuanId($code, $key)
    {
        return $this->model
            ->where('districtid', $code)
            ->where('name', $key)
            ->get();
    }

    public function getWardByDistrictId($idQuan)
    {
        return $this->model
            ->where('districtid', $idQuan)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function findPhuongById($id)
    {
        return $this->model
            ->where('wardid', $id)
            ->first();
    }
}
