<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\LogLichSuNapDiemBangCard;
use App\Validators\LogLichSuNapDiemBangCardValidator;
use App\Repositories\Contracts\LogLichSuNapDiemBangCardRepository;

class LogLichSuNapDiemBangCardRepositoryEloquent extends BaseRepository implements LogLichSuNapDiemBangCardRepository
{
    public function model()
    {
        return LogLichSuNapDiemBangCard::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getByEmail($email, $paginate = null)
    {
        $model = $this->model
            ->where('email_nap_diem', $email)
            ->orderBy('id', 'desc');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getLastByEmail($email)
    {
        return $this->model
            ->where('email_nap_diem', $email)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function getByEmailWithSearch($email, $search, $paginate = null)
    {
        $model = $this->model
            ->where('email_nap_diem', $email)
            ->orderBy('id', 'desc')
            ->where(function ($query) use ($search) {
                $query
                ->orWhere('so_diem', 'LIKE', '%'.$search.'%')
                ->orWhere('trang_thai', 'LIKE', '%'.$search.'%')
                ->orWhere('ngay_nap', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
