<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\LogThuongLandingPage;
use App\Validators\LogThuongLandingPageValidator;
use App\Repositories\Contracts\LogThuongLandingPageRepository;

class LogThuongLandingPageRepositoryEloquent extends BaseRepository implements LogThuongLandingPageRepository
{
    public function model()
    {
        return LogThuongLandingPage::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
