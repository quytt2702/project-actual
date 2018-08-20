<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\NhaCungCap;
use App\Validators\NhaCungCapValidator;
use App\Repositories\Contracts\NhaCungCapRepository;

class NhaCungCapRepositoryEloquent extends BaseRepository implements NhaCungCapRepository
{
    public function model()
    {
        return NhaCungCap::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function toKeyIds($nhaCungCap)
    {
        $nhaCungCapIdKey = [];
        foreach ($nhaCungCap as $item) {
            $nhaCungCapIdKey[$item->id] = $item;
        }

        return $nhaCungCapIdKey;
    }

    public function getActive($paginate = null)
    {
        $model = $this->model
            ->where('nha_cung_cap_is_delete', NhaCungCap::IS_DELETE['NO']);
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getTrash($paginate = null)
    {
        $model = $this->model
            ->where('nha_cung_cap_is_delete', NhaCungCap::IS_DELETE['YES']);
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getActiveWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('nha_cung_cap_is_delete', NhaCungCap::IS_DELETE['NO'])
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('nha_cung_cap.nha_cung_cap_ten', 'LIKE', '%'.$search.'%')
                ->orWhere('nha_cung_cap.nha_cung_cap_dia_chi', 'LIKE', '%'.$search.'%')
                ->orWhere('nha_cung_cap.nha_cung_cap_phone_01', 'LIKE', '%'.$search.'%')
                ->orWhere('nha_cung_cap.nha_cung_cap_phone_02', 'LIKE', '%'.$search.'%')
                ->orWhere('nha_cung_cap.nha_cung_cap_thong_tin_them', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getTrashWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('nha_cung_cap_is_delete', NhaCungCap::IS_DELETE['YES'])
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('nha_cung_cap.nha_cung_cap_ten', 'LIKE', '%'.$search.'%')
                ->orWhere('nha_cung_cap.nha_cung_cap_dia_chi', 'LIKE', '%'.$search.'%')
                ->orWhere('nha_cung_cap.nha_cung_cap_phone_01', 'LIKE', '%'.$search.'%')
                ->orWhere('nha_cung_cap.nha_cung_cap_phone_02', 'LIKE', '%'.$search.'%')
                ->orWhere('nha_cung_cap.nha_cung_cap_thong_tin_them', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
