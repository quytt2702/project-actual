<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\ChuyenMucRepository;
use App\Entities\Admin\ChuyenMuc;
use App\Validators\Admin\ChuyenMucValidator;

class ChuyenMucRepositoryEloquent extends BaseRepository implements ChuyenMucRepository
{

    public function model()
    {
        return ChuyenMuc::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
