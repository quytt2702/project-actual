<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\TmdtSection;
use App\Validators\TmdtSectionValidator;
use App\Repositories\Contracts\TmdtSectionRepository;

class TmdtSectionRepositoryEloquent extends BaseRepository implements TmdtSectionRepository
{
    public function model()
    {
        return TmdtSection::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function toIdKey($tmdtSection)
    {
        $tmdtSectionKey = [];

        foreach ($tmdtSection as $item) {
            $tmdtSectionKey[$item->id] = $item->toArray();
        }

        return $tmdtSectionKey;
    }
}
