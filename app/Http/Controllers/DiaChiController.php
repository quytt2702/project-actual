<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Contracts\WardRepository;
use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Contracts\ProvinceRepository;

class DiaChiController extends Controller
{
    protected $thanhPho;
    protected $quan;
    protected $phuong;

    public function __construct(
        ProvinceRepository $thanhPho,
        DistrictRepository $quan,
        WardRepository $phuong
    ) {
        $this->thanhPho = $thanhPho;
        $this->quan     = $quan;
        $this->phuong   = $phuong;
    }

    public function loadQuan($id)
    {
        $quan = $this->quan->getDistrictByProvinceId($id);

        return view('nguoi_dung.thanh_pho.quan', compact('quan'));
    }

    public function loadPhuong($id)
    {
        $phuong = $this->phuong->getWardByDistrictId($id);

        return view('nguoi_dung.thanh_pho.phuong', compact('phuong'));
    }

    public function thanhPho(Request $request)
    {
        $tinhThanh = $this->tinhThanh->getTinhThanh();

        return view('admin.don_hang_offline.add', compact('tinhThanh'));
    }

    public function searchThanhPho(Request $request, $code)
    {
        $thanhPho = $this->thanhPho->search($code);

        $newThanhPho = [];
        foreach ($thanhPho as $item) {
            $newThanhPho[] = [
                'value' => $item->name,
                'label' => $item->name,
                'id'    => $item->provinceid,
            ];
        }

        return (count($thanhPho) > 0) ? $newThanhPho : [];
    }

    public function searchQuan(Request $request, $code, $key)
    {
        $quan = $this->quan->findByThanhPhoId($code, $key);

        $newQuan = [];
        foreach ($quan as $item) {
            $newQuan[] = [
                'value' => $item->name,
                'label' => $item->name,
                'id'    => $item->provinceid,
            ];
        }

        return (count($quan) > 0) ? $newQuan : [];
    }

    public function searchPhuong(Request $request, $code)
    {
        $phuong = $this->phuong->findByQuanId($code, $key);

        $newPhuong = [];
        foreach ($phuong as $item) {
            $newPhuong[] = [
                'value' => $item->name,
                'label' => $item->name,
                'id'    => $item->districtid,
            ];
        }

        return (count($phuong) > 0) ? $newPhuong : [];
    }
}
