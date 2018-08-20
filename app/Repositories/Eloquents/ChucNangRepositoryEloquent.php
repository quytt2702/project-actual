<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\ChucNang;
use App\Validators\ChucNangValidator;
use App\Repositories\Contracts\ChucNangRepository;

class ChucNangRepositoryEloquent extends BaseRepository implements ChucNangRepository
{
    public function model()
    {
        return ChucNang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function allWithOrderByDesc()
    {
        return $this->model->orderBy('chuc_nang_ten_nhom', 'desc')->get();
    }
}
