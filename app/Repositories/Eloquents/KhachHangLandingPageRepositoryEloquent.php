<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\KhachHangLandingPage;
use App\Validators\KhachHangLandingPageValidator;
use App\Repositories\Contracts\KhachHangLandingPageRepository;

class KhachHangLandingPageRepositoryEloquent extends BaseRepository implements KhachHangLandingPageRepository
{
    public function model()
    {
        return KhachHangLandingPage::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getKhachHangLandingPage($paginate = null)
    {
        $model = $this->model->
            whereNotNull('link_landing_page');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function checkIfNotExit($email, $sdt, $link_landing_page)
    {
        return $this->model
            ->where('email', $email)
            ->where('sdt', $sdt)
            ->where('link_landing_page', $link_landing_page)
            ->first();
    }
}
