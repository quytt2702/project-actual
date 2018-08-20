<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\LogThuong;
use App\Validators\LogThuongValidator;
use App\Repositories\Contracts\LogThuongRepository;

class LogThuongRepositoryEloquent extends BaseRepository implements LogThuongRepository
{
    public function model()
    {
        return LogThuong::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
