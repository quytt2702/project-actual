<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Province;
use App\Validators\ProvinceValidator;
use App\Repositories\Contracts\ProvinceRepository;

class ProvinceRepositoryEloquent extends BaseRepository implements ProvinceRepository
{
    public function model()
    {
        return Province::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function search($key)
    {
        return $this->model
            ->where('name', 'LIKE', '%' . $key . '%')
            ->get();
    }

    public function getTinhThanh()
    {
        return $this->model->orderBy('name', 'asc')->get();
    }

    public function findTinhThanhById($id)
    {
        return $this->model
            ->where('provinceid', $id)
            ->first();
    }
}
