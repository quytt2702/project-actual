<?php

namespace App\Repositories\Eloquents\Landing;

use App\Entities\Landing\LandingSectionInfo;
use App\Repositories\Contracts\Landing\LandingSectionInfoRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class LandingSectionInfoRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class LandingSectionInfoRepositoryEloquent extends BaseRepository implements LandingSectionInfoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LandingSectionInfo::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
