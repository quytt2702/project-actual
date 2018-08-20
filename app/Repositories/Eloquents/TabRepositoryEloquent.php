<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Tab;
use App\Validators\TabValidator;
use App\Repositories\Contracts\TabRepository;

class TabRepositoryEloquent extends BaseRepository implements TabRepository
{
    public function model()
    {
        return Tab::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
