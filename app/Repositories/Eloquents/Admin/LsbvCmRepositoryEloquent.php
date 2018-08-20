<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\lsbv_cmRepository;
use App\Entities\Admin\LsbvCm;
use App\Validators\Admin\LsbvCmValidator;

/**
 * Class LsbvCmRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Admin;
 */
class LsbvCmRepositoryEloquent extends BaseRepository implements LsbvCmRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LsbvCm::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
