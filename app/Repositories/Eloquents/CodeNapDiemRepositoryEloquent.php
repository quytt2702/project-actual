<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\CodeNapDiem;
use App\Validators\CodeNapDiemValidator;
use App\Repositories\Contracts\CodeNapDiemRepository;

class CodeNapDiemRepositoryEloquent extends BaseRepository implements CodeNapDiemRepository
{
    public function model()
    {
        return CodeNapDiem::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllDotTaoMa()
    {
        return $this->model
            ->select('dot_tao_ma')
            ->groupBy('dot_tao_ma')
            ->get();
    }

    public function getAllWithPaginate($paginate = null)
    {
        $model = $this->model->orderBy('created_at', 'desc');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDotTaoMa($dotTaoMa)
    {
        return $this->model
            ->where('dot_tao_ma', $dotTaoMa)
            ->get();
    }

    public function update($dot_tao_ma, $data)
    {
        $this->model
            ->where('dot_tao_ma', $dot_tao_ma)
            ->update([
                'so_diem'   => $data['so_diem'],
                'is_active' => ($data['is_active'] === CodeNapDiem::IS_ACTIVE['YES']) ?  CodeNapDiem::IS_ACTIVE['YES']: CodeNapDiem::IS_ACTIVE['NO'],
            ]);
    }

    public function findByMaVaSeri($ma_nap_diem, $seri)
    {
        return $this->model
            ->where('seri', $seri)
            ->where('ma_nap_tien', $ma_nap_diem)
            ->first();
    }

    public function getWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('code_nap_diem.ma_nap_tien', 'LIKE', '%' . $search . '%')
                    ->orWhere('code_nap_diem.seri', 'LIKE', '%' . $search . '%')
                    ->orWhere('code_nap_diem.so_diem', 'LIKE', '%' . $search . '%')
                    ->orWhere('code_nap_diem.created_at', 'LIKE', '%' . $search . '%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
