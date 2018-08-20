<?php

namespace App\Repositories\Eloquents\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\Admin\Admin;
use App\Validators\Admin\AdminValidator;
use App\Repositories\Contracts\Admin\AdminRepository;

class AdminRepositoryEloquent extends BaseRepository implements AdminRepository
{
    public function model()
    {
        return Admin::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function getAllWithoutMainAdmin()
    {
        return $this->model
            ->where('admin.id_nhom_quyen', '<>', 1)
            ->where('is_delete', Admin::IS_DELETE['NO'])
            ->join('nhom_quyen', 'admin.id_nhom_quyen', 'nhom_quyen.id')
            ->select('admin.*', 'admin.id as id_admin', 'nhom_quyen.ten_nhom', 'nhom_quyen.mo_ta')
            ->get();
    }
}
