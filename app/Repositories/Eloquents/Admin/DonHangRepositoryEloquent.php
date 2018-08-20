<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\DonHangRepository;
use App\Entities\Admin\DonHang;
use App\Validators\Admin\DonHangValidator;

class DonHangRepositoryEloquent extends BaseRepository implements DonHangRepository
{

    public function model()
    {
        return DonHang::class;
    }


    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
