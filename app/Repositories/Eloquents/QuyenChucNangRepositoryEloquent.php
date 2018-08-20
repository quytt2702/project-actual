<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\QuyenChucNang;
use App\Validators\QuyenChucNangValidator;
use App\Repositories\Contracts\QuyenChucNangRepository;

class QuyenChucNangRepositoryEloquent extends BaseRepository implements QuyenChucNangRepository
{
    public function model()
    {
        return QuyenChucNang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByIdQuyenJoinChucNang($id_quyen)
    {
        return $this->model
            ->where('id_quyen', $id_quyen)
            ->join('chuc_nang', 'chuc_nang.id', 'quyen_chuc_nang.id_chuc_nang')
            ->pluck('id_chuc_nang');
    }

    public function findByQuyenIdVaChucNangId($quyen_id, $chuc_nang_id)
    {
        return $this->model
            ->where('id_quyen', $quyen_id)
            ->where('id_chuc_nang', $chuc_nang_id)
            ->first();
    }
}
