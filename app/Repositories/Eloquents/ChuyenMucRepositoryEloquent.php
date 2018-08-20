<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\NgonNgu;
use App\Entities\ChuyenMuc;
use App\Validators\ChuyenMucValidator;
use App\Repositories\Contracts\ChuyenMucRepository;

class ChuyenMucRepositoryEloquent extends BaseRepository implements ChuyenMucRepository
{
    public function model()
    {
        return ChuyenMuc::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function allWithNgonNgu()
    {
        return $this->model
            ->join('ngon_ngu', 'ngon_ngu.id', 'chuyen_muc.id_ngon_ngu')
            ->where('ngon_ngu.is_open', NgonNgu::IS_OPEN['YES'])
            ->select('chuyen_muc.*', 'chuyen_muc.id as chuyen_muc_id', 'ngon_ngu.id', 'ngon_ngu.ten')
            ->get();
    }

    public function findById($id)
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }

    public function findByUrl($url)
    {
        return $this->model
            ->where('url', $url)
            ->first();
    }

    public function findWithNgonNgu($id)
    {
        return $this->model
            ->where('chuyen_muc.id', $id)
            ->join('ngon_ngu', 'ngon_ngu.id', 'chuyen_muc.id_ngon_ngu')
            ->select('chuyen_muc.*', 'ngon_ngu.id', 'ngon_ngu.ten')
            ->first();
    }
}
