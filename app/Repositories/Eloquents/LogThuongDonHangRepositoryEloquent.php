<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\CongTacVien;
use App\Entities\LogThuongDonHang;
use App\Validators\LogThuongDonHangValidator;
use App\Repositories\Contracts\LogThuongDonHangRepository;

class LogThuongDonHangRepositoryEloquent extends BaseRepository implements LogThuongDonHangRepository
{
    public function model()
    {
        return LogThuongDonHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function all($paginate = null)
    {
        $model = $this->model;

        return (empty($paginate)) ? $model->get():$model->paginate($paginate);
    }

    public function thuongMuaHang($congTacVien)
    {
        return $this->model
            ->where('ten_nguoi_duoc_thuong', $congTacVien->email)
            ->get();
    }

    public function thuongDaiLyThang($congTacVien)
    {
        return $this->model
            ->where('log_thuong_don_hang.ten_nguoi_duoc_thuong', $congTacVien->email)
            ->whereMonth('log_thuong_don_hang.created_at', date('m'))
            ->whereYear('log_thuong_don_hang.created_at', date('Y'))
            ->join('cong_tac_vien', 'cong_tac_vien.id', 'log_thuong_don_hang.id_nguoi_duoc_thuong')
            ->where('cong_tac_vien.is_dai_ly', 'YES')
            ->selectRaw('SUM(log_thuong_don_hang.so_tien_mua_don_hang) as tong_tien')
            ->first();
    }

    public function timKiemPart1($content)
    {
        return $this->model
            ->whereMonth('log_thuong_don_hang.created_at', date('m'))
            ->whereYear('log_thuong_don_hang.created_at', date('Y'))
            ->join('cong_tac_vien', 'cong_tac_vien.id', 'log_thuong_don_hang.id_nguoi_duoc_thuong')
            ->where('cong_tac_vien.is_dai_ly', 'YES')
            ->where('cong_tac_vien.email', 'like', '%' . $content . '%')
            ->orWhere('cong_tac_vien.ho_va_ten', 'like', '%' . $content . '%')
            ->orWhere('cong_tac_vien.so_dien_thoai', 'like', '%' . $content . '%')
            ->selectRaw('SUM(log_thuong_don_hang.so_tien_mua_don_hang) as tong_tien, email, ho_va_ten, so_dien_thoai')
            ->groupBy('email', 'ho_va_ten', 'so_dien_thoai')
            ->first();
    }

    public function indexXemThuongDaiLyTrongThangHienTai()
    {
        return $this->model
            ->whereMonth('log_thuong_don_hang.created_at', date('m'))
            ->whereYear('log_thuong_don_hang.created_at', date('Y'))
            ->join('cong_tac_vien', 'cong_tac_vien.id', 'log_thuong_don_hang.id_nguoi_duoc_thuong')
            ->selectRaw('SUM(log_thuong_don_hang.so_tien_mua_don_hang) as tong_tien, email_dai_ly_quan_ly')
            ->where('email_dai_ly_quan_ly', '<>', null)
            ->groupBy('email_dai_ly_quan_ly')
            ->get();
    }

    public function indexXemThuongDaiLyTrongThangTruocDo($thang, $nam)
    {
        return $this->model
            ->whereMonth('log_thuong_don_hang.created_at', $thang)
            ->whereYear('log_thuong_don_hang.created_at', $nam)
            ->join('cong_tac_vien', 'cong_tac_vien.id', 'log_thuong_don_hang.id_nguoi_duoc_thuong')
            ->where('email_dai_ly_quan_ly', '<>', null)
            ->selectRaw('SUM(log_thuong_don_hang.so_tien_mua_don_hang) as tong_tien, email_dai_ly_quan_ly')
            ->groupBy('email_dai_ly_quan_ly')
            ->get();
    }

    public function findKiemTraDonHangDaThuong($id_don_hang)
    {
        return $this->model
            ->where('id_don_hang', $id_don_hang)
            ->first();
    }

    public function findKiemTraDonHangDaThuongByIdVaEmail($id_don_hang, $email)
    {
        return $this->model
            ->where('id_don_hang', $id_don_hang)
            ->where('ten_nguoi_duoc_thuong', $email)
            ->first();
    }

    public function allByEmail($email, $paginate)
    {
        $model = $this->model
            ->where('ten_nguoi_duoc_thuong', $email);

        return (empty($paginate)) ? $model->get():$model->paginate($paginate);
    }
}
