<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\KhachHangRepository;
use App\Entities\Admin\KhachHang;
use App\Validators\Admin\KhachHangValidator;

class KhachHangRepositoryEloquent extends BaseRepository implements KhachHangRepository
{

    public function model()
    {
        return KhachHang::class;
    }


    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
