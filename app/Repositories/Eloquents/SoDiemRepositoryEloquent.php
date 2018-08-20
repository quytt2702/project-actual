<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\SoDiemRepository;
use App\Entities\SoDiem;
use App\Validators\SoDiemValidator;

class SoDiemRepositoryEloquent extends BaseRepository implements SoDiemRepository
{
    public function model()
    {
        return SoDiem::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getLatest()
    {
        return $this->model->orderBy('created_at')->get();
    }

    public function getAllKichHoat()
    {
        return $this->model->where('kich_hoat', SoDiem::KICH_HOAT['YES'])->get();
    }
}
