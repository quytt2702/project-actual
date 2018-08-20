<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\LandingThemeRepository;
use App\Entities\Landing\LandingTheme;
use App\Validators\Landing\LandingThemeValidator;

/**
 * Class LandingThemeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class LandingThemeRepositoryEloquent extends BaseRepository implements LandingThemeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LandingTheme::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
