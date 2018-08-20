<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\LogRutTienVND;
use App\Validators\LogRutTienVNDValidator;
use App\Repositories\Contracts\LogRutTienVNDRepository;

class LogRutTienVNDRepositoryEloquent extends BaseRepository implements LogRutTienVNDRepository
{
    public function model()
    {
        return LogRutTienVND::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getByEmail($email)
    {
        return $this->model->where('email_rut_tien', $email)->get();
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function logRutTienGetPending()
    {
        return $this->model->where('tinh_trang', 'Pending')->get();
    }

    public function logRutTienGetSuccess()
    {
        return $this->model->where('tinh_trang', 'Success')->get();
    }

    public function logRutTienGetCancel()
    {
        return $this->model->where('tinh_trang', 'Admin Cancel')->get();
    }
}
