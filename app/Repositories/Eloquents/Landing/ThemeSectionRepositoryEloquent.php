<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\ThemeSectionRepository;
use App\Entities\Landing\ThemeSection;
use App\Validators\Landing\ThemeSectionValidator;

/**
 * Class ThemeSectionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class ThemeSectionRepositoryEloquent extends BaseRepository implements ThemeSectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ThemeSection::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
