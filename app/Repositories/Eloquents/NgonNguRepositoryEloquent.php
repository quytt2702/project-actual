<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\NgonNgu;
use App\Validators\NgonNguValidator;
use App\Repositories\Contracts\NgonNguRepository;

class NgonNguRepositoryEloquent extends BaseRepository implements NgonNguRepository
{
    public function model()
    {
        return NgonNgu::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findById($id)
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }

    public function getIsOpen()
    {
        return $this->model
            ->where('IS_OPEN', NgonNgu::IS_OPEN['YES'])
            ->get();
    }

    public function findByIdIsOpen($id)
    {
        return $this->model
            ->where('id', $id)
            ->where('IS_OPEN', NgonNgu::IS_OPEN['YES'])
            ->first();
    }

    public function getIsOpenNotVietNam()
    {
        return $this->model
            ->where('IS_OPEN', NgonNgu::IS_OPEN['YES'])
            ->where('id', '<>', 1)
            ->get();
    }
}
