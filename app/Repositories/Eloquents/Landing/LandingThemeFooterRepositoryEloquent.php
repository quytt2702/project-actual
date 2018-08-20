<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\LandingThemeFooterRepository;
use App\Entities\Landing\LandingThemeFooter;
use App\Validators\Landing\LandingThemeFooterValidator;

/**
 * Class LandingThemeFooterRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class LandingThemeFooterRepositoryEloquent extends BaseRepository implements LandingThemeFooterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LandingThemeFooter::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
