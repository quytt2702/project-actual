<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\TmdtPage;
use App\Validators\TmdtPageValidator;
use App\Repositories\Contracts\TmdtPageRepository;

class TmdtPageRepositoryEloquent extends BaseRepository implements TmdtPageRepository
{
    public function model()
    {
        return TmdtPage::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
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

    public function getAll($paginate = null)
    {
        $model = $this->model;
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getAllWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('url', 'LIKE', '%' . $search . '%')
                    ->orWhere('email_nguoi_tao', 'LIKE', '%' . $search . '%')
                    ->orWhere('email_nguoi_edit', 'LIKE', '%' . $search . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $search . '%');
            });

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
