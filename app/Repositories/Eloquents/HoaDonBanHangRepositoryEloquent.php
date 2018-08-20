<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\HoaDonBanHang;
use App\Validators\HoaDonBanHangValidator;
use App\Repositories\Contracts\HoaDonBanHangRepository;

class HoaDonBanHangRepositoryEloquent extends BaseRepository implements HoaDonBanHangRepository
{
    public function model()
    {
        return HoaDonBanHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function getLichSuMuaHangCTV($email, $paginate)
    {
        $model = $this->model
            ->where('email_khach_hang_mua', $email);
            //->orWhere('email_cong_tac_vien', $email);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function findByIdWithKhachHang($id)
    {
        return $this->model
            ->where('hoa_don_ban_hang.id', $id)
            ->join('khach_hang', 'khach_hang.email', 'hoa_don_ban_hang.email_khach_hang_mua')
            ->first();
    }

    public function findByHashWithKhachHang($hash)
    {
        return $this->model
            ->where('hoa_don_ban_hang.hash', $hash)
            ->join('khach_hang', 'khach_hang.email', 'hoa_don_ban_hang.email_khach_hang_mua')
            ->select('hoa_don_ban_hang.created_at', 'ho_ten', 'hash')
            ->first();
    }

    public function findByHashWithKhachHangLandingPage($hash)
    {
        return $this->model
            ->where('hoa_don_ban_hang.hash', $hash)
            ->join('khach_hang_landing_page', 'khach_hang_landing_page.email', 'hoa_don_ban_hang.email_khach_hang_mua')
            ->select('hoa_don_ban_hang.created_at', 'ho_ten', 'hash')
            ->first();
    }

    public function getByCTV()
    {
        return $this->model
            ->where('loai_thanh_toan', 'LIKE', 'CTV%')
            ->whereIn('trang_thai', [HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'], HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN'], HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN']])
            ->join('cong_tac_vien', 'cong_tac_vien.email', 'hoa_don_ban_hang.email_cong_tac_vien')
            ->select('hoa_don_ban_hang.*', 'cong_tac_vien.*', 'hoa_don_ban_hang.id as hoa_don_ban_hang_id')
            ->get();
    }

    public function getByCOD()
    {
        return $this->model
            ->where('loai_thanh_toan', 'LIKE', 'COD%')
            ->whereIn('trang_thai', [HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'], HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'], HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN']])
            ->join('khach_hang', function ($join) {
                $join->on('khach_hang.email', '=', 'hoa_don_ban_hang.email_khach_hang_mua');
                $join->on('khach_hang.sdt', '=', 'hoa_don_ban_hang.sdt_khach_hang_mua');
            })
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.id as hoa_don_ban_hang_id')
            ->get();
    }

    public function thucHienThanhCong()
    {
        return $this->model
            ->where('trang_thai', HoaDonBanHang::TRANG_THAI['THUC_HIEN_THANH_CONG'])
            ->join('khach_hang', function ($join) {
                $join->on('khach_hang.email', '=', 'hoa_don_ban_hang.email_khach_hang_mua');
                $join->on('khach_hang.sdt', '=', 'hoa_don_ban_hang.sdt_khach_hang_mua');
            })
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.id as hoa_don_ban_hang_id')
            ->get();
    }

    public function dangVanChuyen()
    {
        return $this->model
            ->where('trang_thai', HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN'])
            ->join('khach_hang', function ($join) {
                $join->on('khach_hang.email', '=', 'hoa_don_ban_hang.email_khach_hang_mua');
                $join->on('khach_hang.sdt', '=', 'hoa_don_ban_hang.sdt_khach_hang_mua');
            })
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.id as hoa_don_ban_hang_id')
            ->get();
    }

    public function daBiHuyVaHoanKho()
    {
        return $this->model
            ->where('trang_thai', HoaDonBanHang::TRANG_THAI['GIAO_KHONG_DUOC'])
            ->join('khach_hang', function ($join) {
                $join->on('khach_hang.email', '=', 'hoa_don_ban_hang.email_khach_hang_mua');
                $join->on('khach_hang.sdt', '=', 'hoa_don_ban_hang.sdt_khach_hang_mua');
            })
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.id as hoa_don_ban_hang_id')
            ->get();
    }

    public function chuaGiaoHang()
    {
        return $this->model
            ->orWhere('trang_thai', HoaDonBanHang::TRANG_THAI['CHUA_THANH_TOAN'])
            ->orWhere('trang_thai', HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'])
            ->join('khach_hang', function ($join) {
                $join->on('khach_hang.email', '=', 'hoa_don_ban_hang.email_khach_hang_mua');
                $join->on('khach_hang.sdt', '=', 'hoa_don_ban_hang.sdt_khach_hang_mua');
            })
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.id as hoa_don_ban_hang_id')
            ->get();
    }

    public function adminHuyGiaoHang()
    {
        return $this->model
            ->where('trang_thai', HoaDonBanHang::TRANG_THAI['ADMIN_HUY_DON_HANG'])
            ->join('khach_hang', function ($join) {
                $join->on('khach_hang.email', '=', 'hoa_don_ban_hang.email_khach_hang_mua');
                $join->on('khach_hang.sdt', '=', 'hoa_don_ban_hang.sdt_khach_hang_mua');
            })
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.id as hoa_don_ban_hang_id')
            ->get();
    }

    public function searchHDBHNgayThangNam($start, $end, $paginate = null)
    {
        $model = $this->model
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getByMilkAndEmail($email, $paginate = null)
    {
        $model = $this->model
            ->where('email_khach_hang_mua', $email)
            ->where('loai_thanh_toan', 'LIKE', '%MILK%');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getHoaDonBanHangOfflineWithKhachHang()
    {
        return $this->model
            ->where('loai_thanh_toan', 'Offline')
            ->join('khach_hang', function ($join) {
                $join->on('khach_hang.email', '=', 'hoa_don_ban_hang.email_khach_hang_mua');
                $join->on('khach_hang.sdt', '=', 'hoa_don_ban_hang.sdt_khach_hang_mua');
            })
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.id as hoa_don_ban_hang_id')
            ->get();
    }

    public function getHoaDonBanHangLandingPage($paginate = null)
    {
        $model = $this->model
            ->where('loai_thanh_toan', 'LIKE', '%LandingPage%');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDanhSachCongTacVienTichCuc($tuThang, $tuNam, $paginate = null)
    {
        $model = $this->model
            ->select('email', 'so_dien_thoai', 'ho_va_ten', 'cmnd')
            ->join('cong_tac_vien', 'hoa_don_ban_hang.email_khach_hang_mua', 'cong_tac_vien.email')
            ->whereMonth('hoa_don_ban_hang.created_at', '=', $tuThang)
            ->whereYear('hoa_don_ban_hang.created_at', '=', $tuNam);

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDanhSachCongTacVienTichCucBanHang($tuThang, $tuNam, $paginate = null)
    {
        $model = $this->model
            ->selectRaw('email, so_dien_thoai, ho_va_ten, cmnd, count(email) as so_luong')
            ->join('cong_tac_vien', 'hoa_don_ban_hang.email_khach_hang_mua', 'cong_tac_vien.email')
            ->whereMonth('hoa_don_ban_hang.created_at', '=', $tuThang)
            ->whereYear('hoa_don_ban_hang.created_at', '=', $tuNam)
            ->groupBy('email', 'so_dien_thoai', 'ho_va_ten', 'cmnd');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }


    public function getDanhSachCongTacVienTichCucMuaHang($tuThang, $tuNam, $paginate = null)
    {
        $model = $this->model
            ->whereMonth('hoa_don_ban_hang.created_at', '=', $tuThang)
            ->whereYear('hoa_don_ban_hang.created_at', '=', $tuNam)
            ->join('cong_tac_vien', 'hoa_don_ban_hang.email_khach_hang_mua', 'cong_tac_vien.email')
            ->select('email', 'so_dien_thoai', 'ho_va_ten', 'cmnd', 'COUNT(cong_tac_vien.email) as so_luong');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function getDoanhThuBanHang($tuThang, $tuNam, $paginate = null)
    {
        $model = $this->model
            ->whereIn('trang_thai', [
                HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'],
                HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN'],
                HoaDonBanHang::TRANG_THAI['THUC_HIEN_THANH_CONG'],
            ])
            ->whereMonth('hoa_don_ban_hang.created_at', '=', $tuThang)
            ->whereYear('hoa_don_ban_hang.created_at', '=', $tuNam)
            ->join('khach_hang', 'khach_hang.email', 'hoa_don_ban_hang.email_khach_hang_mua')
            ->orderBy('hoa_don_ban_hang.created_at', 'desc');

        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }

    public function tongtienDaNhan()
    {
        return $this->model
            ->whereIn('trang_thai', [
                HoaDonBanHang::TRANG_THAI['DA_THANH_TOAN'],
                HoaDonBanHang::TRANG_THAI['THUC_HIEN_THANH_CONG'],
            ])
            ->selectRaw('SUM(so_tien_mua) as tong_tien_da_nhan')
            ->first();
    }

    public function tongTienDangGiao()
    {
        return $this->model
            ->whereIn('trang_thai', [
                HoaDonBanHang::TRANG_THAI['DANG_VAN_CHUYEN'],
            ])
            ->selectRaw('SUM(so_tien_mua) as tong_tien_dang_giao')
            ->first();
    }

    public function getLichSuMuaHangCTVWithSearch($email, $search, $paginate)
    {
        // $tong_tien = $so_tien_mua + $fee_ship;
        $model = $this->model
            ->where('email_khach_hang_mua', $email)
            ->orWhere('email_cong_tac_vien', $email)
            ->where(function ($query) use ($search) {
                $query
                    ->orWhere('created_at', 'LIKE', '%'.$search.'%')
                    ->orWhere('so_tien_mua', 'LIKE', '%'.$search.'%')
                    ->orWhere('fee_ship', 'LIKE', '%'.$search.'%');
                    // ->orWhere('tong_tien', 'LIKE', '%'.$search.'%');
            });


        if (empty($paginate)) {
            return $model->get();
        }

        return $model->paginate($paginate);
    }
}
