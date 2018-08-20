<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\GioHang;
use App\Validators\GioHangValidator;
use App\Repositories\Contracts\GioHangRepository;

class GioHangRepositoryEloquent extends BaseRepository implements GioHangRepository
{
    public function model()
    {
        return GioHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByEmail($email)
    {
        return $this->model
            ->where('gio_hang_email', $email)
            ->first();
    }
}
