<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Log;
use App\Validators\LogValidator;
use App\Repositories\Contracts\LogRepository;

class LogRepositoryEloquent extends BaseRepository implements LogRepository
{
    public function model()
    {
        return Log::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function table($paginate)
    {
        $model = $this->model
            ->orderBy('created_at', 'desc');

        if (empty($paginate)) {
            return $model->get();
        }
        return $model->paginate($paginate);
    }
}
