<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\cmsp_spRepository;
use App\Entities\Admin\CmspSp;
use App\Validators\Admin\CmspSpValidator;

class CmspSpRepositoryEloquent extends BaseRepository implements CmspSpRepository
{
    public function model()
    {
        return CmspSp::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
