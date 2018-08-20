<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\ThemeRepository;
use App\Entities\Landing\Theme;
use App\Validators\Landing\ThemeValidator;

/**
 * Class ThemeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class ThemeRepositoryEloquent extends BaseRepository implements ThemeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Theme::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
