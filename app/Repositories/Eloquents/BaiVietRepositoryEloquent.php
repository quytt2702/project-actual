<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\BaiViet;
use App\Validators\BaiVietValidator;
use App\Repositories\Contracts\BaiVietRepository;

class BaiVietRepositoryEloquent extends BaseRepository implements BaiVietRepository
{
    public function model()
    {
        return BaiViet::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByUrl($url)
    {
        return $this->model->where('url', $url)->first();
    }

    public function getActive($paginate = null)
    {
        $model = $this->model
            ->where('is_delete', BaiViet::IS_DELETE['NO']);


        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getTrash($paginate = null)
    {
        $model = $this->model->where('is_delete', BaiViet::IS_DELETE['YES']);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function findById($id)
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }

    public function getActiveWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('is_delete', BaiViet::IS_DELETE['NO'])
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('bai_viet.tieu_de', 'LIKE', '%'.$search.'%')
                ->orWhere('bai_viet.url', 'LIKE', '%'.$search.'%')
                ->orWhere('bai_viet.nguoi_tao', 'LIKE', '%'.$search.'%')
                ->orWhere('bai_viet.nguoi_duyet', 'LIKE', '%'.$search.'%');
            });

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getTrashWithSearch($search, $paginate = null)
    {
        return $this->model
            ->where('is_delete', BaiViet::IS_DELETE['YES'])
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('bai_viet.tieu_de', 'LIKE', '%'.$search.'%')
                ->orWhere('bai_viet.url', 'LIKE', '%'.$search.'%')
                ->orWhere('bai_viet.nguoi_tao', 'LIKE', '%'.$search.'%')
                ->orWhere('bai_viet.nguoi_duyet', 'LIKE', '%'.$search.'%');
            });

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getByIdChuyenMuc($id_chuyen_muc)
    {
        return $this->model
            ->where('id_chuyen_muc', 'LIKE', '%"' . $id_chuyen_muc . '"%')
            ->get();
    }
}
