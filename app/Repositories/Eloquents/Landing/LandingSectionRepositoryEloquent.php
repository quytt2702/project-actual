<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\LandingSectionRepository;
use App\Entities\Landing\LandingSection;
use App\Validators\Landing\LandingSectionValidator;

/**
 * Class LandingSectionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class LandingSectionRepositoryEloquent extends BaseRepository implements LandingSectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LandingSection::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
