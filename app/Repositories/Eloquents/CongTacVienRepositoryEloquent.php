<?php

namespace App\Repositories\Eloquents;

use DB;
use Uuid;
use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\CongTacVien;
use App\Validators\CongTacVienValidator;
use App\Repositories\Contracts\CongTacVienRepository;

class CongTacVienRepositoryEloquent extends BaseRepository implements CongTacVienRepository
{
    public function model()
    {
        return CongTacVien::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function register($data)
    {
        $data['txid']                     = Uuid::generate(4)->string;
        $data['password']                 = bcrypt($data['password']);
        $data['convert_email']            = convert_email($data['email']);
        $data['admin_kich_hoat']          = CongTacVien::ADMIN_KICH_HOAT['NO'];
        $data['trang_thai_quen_mat_khau'] = CongTacVien::TRANG_THAI_QUEN_MAT_KHAU['NO'];

        return $this->model->create($data);
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function findByTxidQuenMatKhau($txid)
    {
        return $this->model
            ->where('txid_quen_mat_khau', $txid)
            ->where('trang_thai_quen_mat_khau', CongTacVien::TRANG_THAI_QUEN_MAT_KHAU['YES'])
            ->first();
    }

    public function findByTxid($txid)
    {
        return $this->model->where('txid', $txid)->first();
    }

    public function allWithNhomQuyenNganHang($paginate = null)
    {
        $model = $this->model
            ->where('is_dai_ly', CongTacVien::IS_DAI_LY['NO'])
            ->where('is_delete', CongTacVien::IS_DELETE['NO'])
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->join('ngan_hang', 'ngan_hang.id', 'cong_tac_vien.id_ngan_hang');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function findByTxidWithNhomQuyenNganHang($txid)
    {
        return $this->model
            ->where('txid', $txid)
            ->where('is_delete', CongTacVien::IS_DELETE['NO'])
            ->join('ngan_hang', 'ngan_hang.id', 'cong_tac_vien.id_ngan_hang')
            ->first();
    }

    public function getChuaCoQuanLy()
    {
        return $this->model
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->where('is_dai_ly', CongTacVien::IS_DAI_LY['NO'])
            ->whereNull('email_dai_ly_quan_ly')
            ->get();
    }

    public function getQuanLyBoiCongTacVienKhac($email)
    {
        return $this->model
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->where('email_dai_ly_quan_ly', '<>', $email)
            ->get();
    }

    public function getQuanLyBoiToi($email)
    {
        return $this->model
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->where('email_dai_ly_quan_ly', $email)
            ->where('email', '<>', $email)
            ->get();
    }

    public function randomCongTacVien($so_luong)
    {
        return $this->model->selectRaw('*, rand() as random')
            ->where('so_thanh_vien_da_gioi_thieu', $so_luong)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->orderBy('random', 'desc')
            ->first();
    }

    public function getByEmail($email, $paginate = null)
    {
        $model = $this->model
            ->where('email_gioi_thieu', $email)
            ->orderBy('created_at', 'desc');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getByEmailGioiThieu($email, $paginate = null)
    {
        $model = $this->model
            ->where('email_gioi_thieu', $email);
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDaXacThuc()
    {
        return $this->model
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->get();
    }

    public function getDaXacThucBoiDaiLy($congTacVien)
    {
        return $this->model
            ->where('email_dai_ly_quan_ly', $congTacVien->email)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->where('is_block', CongTacVien::IS_BLOCK['NO'])
            ->where('is_delete', CongTacVien::IS_DELETE['NO'])
            ->get();
    }

    public function getDaXacThucVaCoDoanhThuBoiDaiLy($congTacVien, $paginate = null)
    {
        $model = $this->model
            ->where('email_dai_ly_quan_ly', $congTacVien->email)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->where('is_block', CongTacVien::IS_BLOCK['NO'])
            ->where('is_delete', CongTacVien::IS_DELETE['NO'])
            ->join('hoa_don_ban_hang', 'hoa_don_ban_hang.email_khach_hang_mua', 'cong_tac_vien.email');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getXacThuc($congTacVien, $paginate = null)
    {
        $model = $this->model
            ->where('email_dai_ly_quan_ly', $congTacVien->email)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->where('is_block', CongTacVien::IS_BLOCK['NO'])
            ->where('is_delete', CongTacVien::IS_DELETE['NO']);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getByEmailVaChuaXacThuc($email, $paginate = null)
    {
        $model = $this->model
            ->where('email_gioi_thieu', $email)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['PENDING']);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDaiLy()
    {
        return $this->model
            ->where('is_dai_ly', CongTacVien::IS_DAI_LY['YES'])
            ->get();
    }

    public function getDaiLyWithNganHang($paginate = null)
    {
        $model = $this->model
            ->where('is_dai_ly', CongTacVien::IS_DAI_LY['YES'])
            ->join('ngan_hang', 'ngan_hang.id', 'cong_tac_vien.id_ngan_hang');
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getCongTacVienWithNganHang($paginate = null)
    {
        $model = $this->model
            ->where('is_dai_ly', CongTacVien::IS_DAI_LY['NO'])
            ->join('ngan_hang', 'ngan_hang.id', 'cong_tac_vien.id_ngan_hang');
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function findByEmailXacThuc($email)
    {
        return $this->model
            ->where('email', $email)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->first();
    }

    public function allWithNhomQuyenNganHangWithSearch($search, $paginate = null)
    {
        $model =  $this->model
            ->where('is_dai_ly', CongTacVien::IS_DAI_LY['NO'])
            ->where('is_delete', CongTacVien::IS_DELETE['NO'])
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->join('ngan_hang', 'ngan_hang.id', 'cong_tac_vien.id_ngan_hang')
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('cong_tac_vien.dia_chi_hien_tai', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.email', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ho_va_ten', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.so_tai_khoan', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ten_chu_tai_khoan', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDaiLyWithNganHangWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->join('ngan_hang', 'ngan_hang.id', 'cong_tac_vien.id_ngan_hang')
            ->where('cong_tac_vien.is_dai_ly', CongTacVien::IS_DAI_LY['YES'])
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('cong_tac_vien.dia_chi_hien_tai', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ho_va_ten', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.so_tai_khoan', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ten_chu_tai_khoan', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.email', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getChuaXacThuc($paginate = null)
    {
        $model = $this->model
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['PENDING'])
            ->orderBy('created_at', 'desc');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getNewChuaXacThuc($paginate = null)
    {
        $model = $this->model
            ->leftJoin('cong_tac_vien as ctv', 'cong_tac_vien.email_gioi_thieu', 'ctv.email')
            ->where('cong_tac_vien.is_kich_hoat', CongTacVien::IS_KICH_HOAT['PENDING'])
            ->orderBy('cong_tac_vien.created_at', 'desc')
            ->select('cong_tac_vien.email', 'cong_tac_vien.ho_va_ten', 'cong_tac_vien.so_dien_thoai', 'cong_tac_vien.ip_dang_ky', 'cong_tac_vien.created_at as cong_tac_vien_created_at', 'ctv.email as email_ctv', 'ctv.ho_va_ten as ho_va_ten_ctv', 'cong_tac_vien.txid as cong_tac_vien_txid');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getChuaXacThucWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['PENDING'])
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('cong_tac_vien.email', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ho_va_ten', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ip_dang_ky', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.created_at', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getByEmailGioiThieuWithSearch($email, $search, $paginate = null)
    {
        $model = $this->model
            ->where('email_gioi_thieu', $email)
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('cong_tac_vien.email', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ho_va_ten', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getCongTacVienWithNganHangWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('is_dai_ly', CongTacVien::IS_DAI_LY['NO'])
            ->join('ngan_hang', 'ngan_hang.id', 'cong_tac_vien.id_ngan_hang')
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('cong_tac_vien.ho_va_ten', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.dia_chi_hien_tai', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.so_tai_khoan', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ten_chu_tai_khoan', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.email', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getByEmailVaChuaXacThucWithSearch($email, $search, $paginate = null)
    {
        $model = $this->model
            ->where('email_gioi_thieu', $email)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['PENDING'])
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('cong_tac_vien.email_gioi_thieu', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.ip_dang_ky', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDaXacThucVaCoDoanhThuBoiDaiLyWithSearch($congTacVien, $search, $paginate = null)
    {
        $model = $this->model
            ->where('email_dai_ly_quan_ly', $congTacVien->email)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->where('is_dai_ly', CongTacVien::IS_DAI_LY['YES'])
            ->where('is_block', CongTacVien::IS_BLOCK['NO'])
            ->where('is_delete', CongTacVien::IS_DELETE['NO'])
            ->join('hoa_don_ban_hang', 'hoa_don_ban_hang.email_khach_hang_mua', 'cong_tac_vien.email')
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('cong_tac_vien.ho_va_ten', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.dia_chi_hien_tai', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.so_tai_khoan', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.email', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDaXacThucVaCoDoanhThuWithSearch($search, $paginate = null)
    {
        $model = $this->model
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->join('hoa_don_ban_hang', 'hoa_don_ban_hang.email_khach_hang_mua', 'cong_tac_vien.email')
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('cong_tac_vien.ho_va_ten', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.dia_chi_hien_tai', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.so_tai_khoan', 'LIKE', '%'.$search.'%')
                    ->orWhere('cong_tac_vien.email', 'LIKE', '%'.$search.'%');
            });
        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getCongTacVienByDay($date)
    {
        return $this->model
            ->whereDate('created_at', $date->toDateString())
            ->get();
    }

    public function getCongTacVienDaXacThucByDay($date)
    {
        return $this->model
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->whereDate('created_at', $date->toDateString())
            ->get();
    }

    public function searchCTVNgayThangNam($start, $end, $paginate = null)
    {
        $model = $this->model
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function searchCTVNgayThangNamDaXacThuc($start, $end, $paginate = null)
    {
        $model = $this->model
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE']);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function thongKeThuNhapTheoThangNam($thang, $nam, $limit = null)
    {
        $page = LengthAwarePaginator::resolveCurrentPage();
        $offset = ($page - 1) * $limit;

        $tongCongTacVien = CongTacVien::count();
        $items = DB::select("
            SELECT x.id, x.email, x.ho_va_ten, x.so_dien_thoai, sum(x.TienThuongGioiThieu) as TienThuongGioiThieu, sum(x.TienThuongDonHang) as TienThuongDonHang, sum(x.TienThuongDaiLy) as TienThuongDaiLy
            FROM(
            (SELECT cong_tac_vien.id, email, ho_va_ten, so_dien_thoai, sum(b.so_tien) as TienThuongGioiThieu, (0) as 'TienThuongDonHang', (0) as 'TienThuongDaiLy'
            FROM  cong_tac_vien
            LEFT JOIN log_thuong_gioi_thieu b on email = b.ten_nguoi_duoc_thuong and MONTH(b.created_at) = {$thang} and YEAR(b.created_at) = {$nam}
            GROUP BY cong_tac_vien.id, email, ho_va_ten, so_dien_thoai, 'TienThuongDonHang', 'TienThuongDaiLy')
            UNION ALL
            (SELECT cong_tac_vien.id, email, ho_va_ten, so_dien_thoai, (0) as 'TienThuongGioiThieu', sum(a.so_tien_duoc_thuong) as TienThuongDonHang, (0) as 'TienThuongDaiLy'
            FROM  cong_tac_vien
            LEFT JOIN log_thuong_don_hang a on email = a.ten_nguoi_duoc_thuong and MONTH(a.created_at) = {$thang} and YEAR(a.created_at) = {$nam}
            GROUP BY cong_tac_vien.id, email, ho_va_ten, so_dien_thoai, 'TienThuongGioiThieu', 'TienThuongDaiLy')
            UNION ALL
            (SELECT cong_tac_vien.id, email, ho_va_ten, so_dien_thoai, (0) as 'TienThuongGioiThieu', (0) as 'TienThuongDonHang', sum(c.so_tien_thuong) as TienThuongDaiLy
            FROM  cong_tac_vien
            LEFT JOIN log_thuong_dai_ly c on email = c.email_dai_ly and MONTH(c.created_at) = {$thang} and YEAR(c.created_at) = {$nam}
            GROUP BY cong_tac_vien.id, email, ho_va_ten, so_dien_thoai, 'TienThuongGioiThieu', 'TienThuongDonHang')) as x
            GROUP BY x.id, x.email, x.ho_va_ten, x.so_dien_thoai
            LIMIT {$limit}
            OFFSET {$offset}
        ");

        $paginator = new LengthAwarePaginator($items, $tongCongTacVien, $limit, $page);

        return $paginator;
    }

    public function getDanhSachCongTacVienTichCucGioiThieu($tuThang, $tuNam, $paginate = null)
    {
        return $this->model
            ->whereMonth('cong_tac_vien.created_at', $tuThang)
            ->whereYear('cong_tac_vien.created_at', $tuNam)
            ->leftJoin('cong_tac_vien as b', 'cong_tac_vien.email_gioi_thieu', 'b.email')
            ->groupBy('cong_tac_vien.email_gioi_thieu', 'b.ho_va_ten', 'b.so_dien_thoai', 'b.cmnd')
            ->selectRaw('cong_tac_vien.email_gioi_thieu as cong_tac_vien_email, count(cong_tac_vien.email_gioi_thieu) as so_luong, b.ho_va_ten as cong_tac_vien_ho_va_ten, b.so_dien_thoai as cong_tac_vien_so_dien_thoai, b.cmnd as cong_tac_vien_cmnd')
            ->havingRaw('count(cong_tac_vien.email_gioi_thieu) > ?', [0])
            ->orderByRaw('count(cong_tac_vien.email_gioi_thieu) desc')
            ->get();
    }

    public function findBySDTDaXacThuc($so_dien_thoai)
    {
        return $this->model
            ->where('so_dien_thoai', $so_dien_thoai)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->first();
    }

    public function findByCMNDDaXacThuc($cmnd)
    {
        return $this->model
            ->where('cmnd', $cmnd)
            ->where('is_kich_hoat', CongTacVien::IS_KICH_HOAT['DONE'])
            ->first();
    }
}
