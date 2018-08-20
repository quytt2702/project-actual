<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\KhachHangDangNhap;
use App\Validators\KhachHangDangNhapValidator;
use App\Repositories\Contracts\KhachHangDangNhapRepository;

class KhachHangDangNhapRepositoryEloquent extends BaseRepository implements KhachHangDangNhapRepository
{
    public function model()
    {
        return KhachHangDangNhap::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
