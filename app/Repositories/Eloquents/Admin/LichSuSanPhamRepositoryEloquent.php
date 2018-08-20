<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\LichSuSanPhamRepository;
use App\Entities\Admin\LichSuSanPham;
use App\Validators\Admin\LichSuSanPhamValidator;

class LichSuSanPhamRepositoryEloquent extends BaseRepository implements LichSuSanPhamRepository
{

    public function model()
    {
        return LichSuSanPham::class;
    }

    
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
