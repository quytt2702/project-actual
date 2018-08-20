<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\ChiTietDonHangRepository;
use App\Entities\Admin\ChiTietDonHang;
use App\Validators\Admin\ChiTietDonHangValidator;

class ChiTietDonHangRepositoryEloquent extends BaseRepository implements ChiTietDonHangRepository
{

    public function model()
    {
        return ChiTietDonHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
