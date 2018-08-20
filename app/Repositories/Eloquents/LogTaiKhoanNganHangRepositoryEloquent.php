<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\LogTaiKhoanNganHang;
use App\Validators\LogTaiKhoanNganHangValidator;
use App\Repositories\Contracts\LogTaiKhoanNganHangRepository;

class LogTaiKhoanNganHangRepositoryEloquent extends BaseRepository implements LogTaiKhoanNganHangRepository
{
    public function model()
    {
        return LogTaiKhoanNganHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByHash($hash)
    {
        return $this->model->where('hash', $hash)->first();
    }

    public function updateBeforeLog($email)
    {
        return $this->model
            ->where('email', $email)
            ->where('trang_thai', LogTaiKhoanNganHang::TRANG_THAI['NOT_YET'])
            ->update(['TRANG_THAI' => LogTaiKhoanNganHang::TRANG_THAI['BLOCK']]);
    }
}
