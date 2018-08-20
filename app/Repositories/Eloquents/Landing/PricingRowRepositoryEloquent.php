<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\PricingRowRepository;
use App\Entities\Landing\PricingRow;
use App\Validators\Landing\PricingRowValidator;

/**
 * Class PricingRowRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class PricingRowRepositoryEloquent extends BaseRepository implements PricingRowRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PricingRow::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
