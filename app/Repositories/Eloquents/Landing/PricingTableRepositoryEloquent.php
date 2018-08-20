<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\PricingTableRepository;
use App\Entities\Landing\PricingTable;
use App\Validators\Landing\PricingTableValidator;

/**
 * Class PricingTableRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class PricingTableRepositoryEloquent extends BaseRepository implements PricingTableRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PricingTable::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
