<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\NganHang;
use App\Validators\NganHangValidator;
use App\Repositories\Contracts\NganHangRepository;

class NganHangRepositoryEloquent extends BaseRepository implements NganHangRepository
{
    public function model()
    {
        return NganHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
