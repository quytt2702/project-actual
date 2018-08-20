<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\TinhThanh;
use App\Validators\TinhThanhValidator;
use App\Repositories\Contracts\TinhThanhRepository;

class TinhThanhRepositoryEloquent extends BaseRepository implements TinhThanhRepository
{
    public function model()
    {
        return TinhThanh::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
