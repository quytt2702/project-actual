<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Admin\CaiDat;
use App\Validators\Admin\CaiDatValidator;
use App\Repositories\Contracts\Admin\CaiDatRepository;

class CaiDatRepositoryEloquent extends BaseRepository implements CaiDatRepository
{

    public function model()
    {
        return CaiDat::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getConfig()
    {
        return $this->model->where('id', 1)->first();
    }
}
