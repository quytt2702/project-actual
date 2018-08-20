<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\CongTacVien;
use App\Entities\TienNguoiDung;
use App\Validators\TienNguoiDungValidator;
use App\Repositories\Contracts\TienNguoiDungRepository;

class TienNguoiDungRepositoryEloquent extends BaseRepository implements TienNguoiDungRepository
{
    public function model()
    {
        return TienNguoiDung::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByEmail($email)
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }
}
