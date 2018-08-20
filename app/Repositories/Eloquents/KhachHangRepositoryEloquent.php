<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Entities\KhachHang;
use App\Validators\KhachHangValidator;
use App\Repositories\Contracts\KhachHangRepository;

class KhachHangRepositoryEloquent extends BaseRepository implements KhachHangRepository
{
    public function model()
    {
        return KhachHang::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function createIfNotExist($data)
    {
        $khachHang = $this->model
            ->where('sdt', $data['sdt'])
            ->where('email', $data['email'])
            ->first();

        if (empty($khachHang)) {
            return $this->model->create($data);
        }

        return 0;
    }

    public function findByEmailVaSdtVaEmailCTVNull($email, $sdt)
    {
        return $this->model
            ->where('email', $email)
            ->where('sdt', $sdt)
            ->where('email_ctv', null)
            ->first();
    }

    public function findByEmailVaSdtVaKhacOffline($email, $sdt)
    {
        return $this->model
            ->where('email', $email)
            ->where('sdt', $sdt)
            ->where('email_ctv', '<>', 'Offline')
            ->first();
    }

    public function getByEmailVaSdt($email, $sdt)
    {
        return $this->model
            ->where('email', $email)
            ->where('sdt', $sdt)
            ->get();
    }

    public function findByEmailVaSdtWithOffline($email, $sdt)
    {
        return $this->model
            ->where('email', $email)
            ->where('sdt', $sdt)
            ->where('email_ctv', 'Offline')
            ->first();
    }

    public function findByEmailVaSdtNotOffline($email, $sdt)
    {
        return $this->model
            ->where('email', $email)
            ->where('sdt', $sdt)
            ->where(function ($query) {
                $query->orWhere('email_ctv', '<>', 'Offline');
                $query->orWhere('email_ctv', null);
            })
            ->first();
    }

    public function createKhachHang($data, $request)
    {
        $khachHang = $this->getByEmailVaSdt($data['email'], $data['sdt']);

        // Tìm email người giới thiệu
        $hash                      = $request->cookie('ctvid');
        $congTacVienGioiThieu      = \DB::table('cong_tac_vien')->where('txid', $hash)->first();
        $emailCongTacVienGioiThieu = empty($congTacVienGioiThieu) ? null : $congTacVienGioiThieu->email;

        // Nếu khách hàng mà chưa có trong DB thì tạo mới
        if (count($khachHang) === 0) {
            $this->model->create([
                'email'      => $data['email'],
                'ho_ten'     => $data['ho_ten'],
                'sdt'        => $data['sdt'],
                'duong'      => $data['duong'],
                'phuong'     => $data['phuong'],
                'quan_huyen' => $data['quan_huyen'],
                'thanh_pho'  => $data['thanh_pho'],
                'email_ctv'  => $emailCongTacVienGioiThieu,
            ]);
        } else {
            // Nếu khách hàng đã có trong DB
            foreach ($khachHang as $item) {
                if (empty($item->email_ctv) && empty($emailCongTacVienGioiThieu)) {
                    $item->email_ctv = $emailCongTacVienGioiThieu;
                }
                $item->duong      = empty($khachHang->duong) ? $data['duong'] : $khachHang->duong;
                $item->phuong     = empty($khachHang->phuong) ? $data['phuong'] : $khachHang->phuong;
                $item->quan_huyen = empty($khachHang->quan_huyen) ? $data['quan_huyen'] : $khachHang->quan_huyen;
                $item->thanh_pho  = empty($khachHang->thanh_pho) ? $data['thanh_pho'] : $khachHang->thanh_pho;
                $item->save();
            }
        }
    }
}
