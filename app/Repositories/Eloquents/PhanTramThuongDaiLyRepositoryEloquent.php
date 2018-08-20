<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\PhanTramThuongDaiLy;
use App\Validators\PhanTramThuongDaiLyValidator;
use App\Repositories\Contracts\PhanTramThuongDaiLyRepository;

class PhanTramThuongDaiLyRepositoryEloquent extends BaseRepository implements PhanTramThuongDaiLyRepository
{
    public function model()
    {
        return PhanTramThuongDaiLy::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findMucYeuCau($tongTien)
    {
        return $this->model
            ->where('muc_yeu_cau_duoi', '<=', $tongTien)
            ->where('muc_yeu_cau_tren', '>=', $tongTien)
            ->orderBy('muc_yeu_cau_tren', 'desc')
            ->first();
    }
}
