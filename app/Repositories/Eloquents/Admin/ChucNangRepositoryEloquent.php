<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Admin\ChucNang;
use App\Validators\Admin\ChucNangValidator;
use App\Repositories\Contracts\Admin\ChucNangRepository;

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
}
