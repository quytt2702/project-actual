<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\CongTacVien;
use App\Entities\LogThuongGioiThieu;
use App\Validators\LogThuongGioiThieuValidator;
use App\Repositories\Contracts\LogThuongGioiThieuRepository;

class LogThuongGioiThieuRepositoryEloquent extends BaseRepository implements LogThuongGioiThieuRepository
{
    public function model()
    {
        return LogThuongGioiThieu::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function kiemTraThuongGioiThieu($congTacVien)
    {
        return $this->model
            ->where('ten_nguoi_duoc_thuong', $congTacVien->email_gioi_thieu)
            ->where('ten_nguoi_lien_quan', $congTacVien->email)
            ->first();
    }

    public function getByEmail($email, $paginate = null)
    {
        $model = $this->model
            ->where('ten_nguoi_duoc_thuong', $email);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function thuongGioiThieuThanhVien($congTacVien)
    {
        return $this->model
            ->where('log_thuong_gioi_thieu.ten_nguoi_duoc_thuong', $congTacVien->email)
            ->join('cong_tac_vien', 'cong_tac_vien.email', 'log_thuong_gioi_thieu.ten_nguoi_lien_quan')
            ->get();
    }

    public function getByEmailWithSearch($email, $search, $paginate = null)
    {
        $model = $this->model
            ->where('ten_nguoi_duoc_thuong', $email)
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('ten_nguoi_duoc_thuong', 'LIKE', '%'.$search.'%')
                    ->orWhere('so_tien', 'LIKE', '%'.$search.'%')
                    ->orWhere('li_do', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
