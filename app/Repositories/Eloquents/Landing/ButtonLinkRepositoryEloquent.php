<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\ButtonLinkRepository;
use App\Entities\Landing\ButtonLink;
use App\Validators\Landing\ButtonLinkValidator;

/**
 * Class ButtonLinkRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class ButtonLinkRepositoryEloquent extends BaseRepository implements ButtonLinkRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ButtonLink::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
