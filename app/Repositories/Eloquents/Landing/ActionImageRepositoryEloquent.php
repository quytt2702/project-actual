<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\ActionImageRepository;
use App\Entities\Landing\ActionImage;
use App\Validators\Landing\ActionImageValidator;

/**
 * Class ActionImageRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class ActionImageRepositoryEloquent extends BaseRepository implements ActionImageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ActionImage::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
