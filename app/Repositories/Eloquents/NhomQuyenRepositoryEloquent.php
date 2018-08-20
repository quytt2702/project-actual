<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\NhomQuyen;
use App\Validators\NhomQuyenValidator;
use App\Repositories\Contracts\NhomQuyenRepository;

class NhomQuyenRepositoryEloquent extends BaseRepository implements NhomQuyenRepository
{
    public function model()
    {
        return NhomQuyen::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllNhomQuyen()
    {
        return $this->model
            ->where('id', '<>', 1)
            ->get();
    }
}
