<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\IconContentRepository;
use App\Entities\Landing\IconContent;
use App\Validators\Landing\IconContentValidator;

/**
 * Class IconContentRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class IconContentRepositoryEloquent extends BaseRepository implements IconContentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return IconContent::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
