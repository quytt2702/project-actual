<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Admin\lssp_cmspRepository;
use App\Entities\Admin\LsspCmsp;
use App\Validators\Admin\LsspCmspValidator;

/**
 * Class LsspCmspRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Admin;
 */
class LsspCmspRepositoryEloquent extends BaseRepository implements LsspCmspRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LsspCmsp::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
