<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\HoaDonNhapHangRepository;
use App\Entities\Admin\HoaDonNhapHang;
use App\Validators\Admin\HoaDonNhapHangValidator;

/**
 * Class HoaDonNhapHangRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Admin;
 */
class HoaDonNhapHangRepositoryEloquent extends BaseRepository implements HoaDonNhapHangRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HoaDonNhapHang::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
