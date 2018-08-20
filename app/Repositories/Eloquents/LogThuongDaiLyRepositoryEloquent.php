<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\LogThuongDaiLy;
use App\Validators\LogThuongDaiLyValidator;
use App\Repositories\Contracts\LogThuongDaiLyRepository;

class LogThuongDaiLyRepositoryEloquent extends BaseRepository implements LogThuongDaiLyRepository
{
    public function model()
    {
        return LogThuongDaiLy::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getByCTV($congTacVien)
    {
        return $this->model
            ->where('email_dai_ly', $congTacVien->email)
            ->get();
    }

    public function timKiemPart2($content)
    {
        return $this->model
            ->join('cong_tac_vien', 'cong_tac_vien.email', 'log_thuong_dai_ly.email_dai_ly')
            ->where('cong_tac_vien.is_dai_ly', 'YES')
            ->where('cong_tac_vien.email', 'like', '%' . $content . '%')
            ->orWhere('cong_tac_vien.ho_va_ten', 'like', '%' . $content . '%')
            ->orWhere('cong_tac_vien.so_dien_thoai', 'like', '%' . $content . '%')
            ->select('log_thuong_dai_ly.*', 'cong_tac_vien.email as cong_tac_vien_email', 'cong_tac_vien.ho_va_ten as cong_tac_vien_ho_va_ten', 'cong_tac_vien.so_dien_thoai as cong_tac_vien_sdt')
            ->get();
    }

    public function xemThangNamThuongDaiLy($thang, $nam)
    {
        return $this->model
            ->join('cong_tac_vien', 'cong_tac_vien.email', 'log_thuong_dai_ly.email_dai_ly')
            ->where('thang', $thang)
            ->where('nam', $nam)
            ->select('log_thuong_dai_ly.*', 'cong_tac_vien.email as cong_tac_vien_email', 'cong_tac_vien.ho_va_ten as cong_tac_vien_ho_va_ten', 'cong_tac_vien.so_dien_thoai as cong_tac_vien_sdt')
            ->get();
    }

    public function kiemTraThuong($thang, $nam)
    {
        return $this->model
            ->where('thang', $thang)
            ->where('nam', $nam)
            ->first();
    }

    public function getThuongDaiLyByEmail($email)
    {
        return $this->model
            ->join('cong_tac_vien', 'cong_tac_vien.email', 'log_thuong_dai_ly.email_dai_ly')
            ->where('cong_tac_vien.email', $email)
            ->select('log_thuong_dai_ly.*', 'cong_tac_vien.email as cong_tac_vien_email', 'cong_tac_vien.ho_va_ten as cong_tac_vien_ho_va_ten', 'cong_tac_vien.so_dien_thoai as cong_tac_vien_sdt')
            ->get();
    }
}
