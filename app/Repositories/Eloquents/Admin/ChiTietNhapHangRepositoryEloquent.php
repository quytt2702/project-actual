<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\ChiTietNhapHangRepository;
use App\Entities\Admin\ChiTietNhapHang;
use App\Validators\Admin\ChiTietNhapHangValidator;

class ChiTietNhapHangRepositoryEloquent extends BaseRepository implements ChiTietNhapHangRepository
{
    public function model()
    {
        return ChiTietNhapHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
