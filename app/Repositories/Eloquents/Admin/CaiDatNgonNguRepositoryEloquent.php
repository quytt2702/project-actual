<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Admin\CaiDatNgonNgu;
use App\Validators\Admin\CaiDatNgonNguValidator;
use App\Repositories\Contracts\Admin\CaiDatNgonNguRepository;

class CaiDatNgonNguRepositoryEloquent extends BaseRepository implements CaiDatNgonNguRepository
{
    public function model()
    {
        return CaiDatNgonNgu::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByIdNgonNgu($id_ngon_ngu)
    {
        return $this->model
            ->where('id_ngon_ngu', $id_ngon_ngu)
            ->first();
    }

    public function findLinkTrangChu($url)
    {
        return $this->model
            ->where('link_trang_chu', $url)
            ->first();
    }
}
