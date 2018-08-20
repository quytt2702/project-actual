<?php

namespace App\Repositories\Eloquents\Landing;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\Landing\SectionQuoteRepository;
use App\Entities\Landing\SectionQuote;
use App\Validators\Landing\SectionQuoteValidator;

/**
 * Class SectionQuoteRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents\Landing;
 */
class SectionQuoteRepositoryEloquent extends BaseRepository implements SectionQuoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SectionQuote::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
