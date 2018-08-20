<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\KhachHangLangdingPage;
use App\Validators\KhachHangLangdingPageValidator;
use App\Repositories\Contracts\KhachHangLangdingPageRepository;

class KhachHangLangdingPageRepositoryEloquent extends BaseRepository implements KhachHangLangdingPageRepository
{
    public function model()
    {
        return KhachHangLangdingPage::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
