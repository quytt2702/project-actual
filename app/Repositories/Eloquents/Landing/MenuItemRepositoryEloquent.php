<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\MenuItemRepository;
use App\Entities\Landing\MenuItem;
use App\Validators\Landing\MenuItemValidator;

/**
 * Class MenuItemRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class MenuItemRepositoryEloquent extends BaseRepository implements MenuItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MenuItem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
