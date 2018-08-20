<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;

class TonKhoController extends Controller
{
    protected $sanPham;
    protected $paginate = 10;

    public function __construct(SanPhamRepository $sanPham)
    {
        $this->sanPham = $sanPham;
    }

    public function index()
    {
        return view('admin.ton_kho.index');
    }

    public function table(Request $request)
    {
        $sanPham = $this->sanPham->paginate($this->paginate);

        return view('admin.ton_kho.partials.table', compact('sanPham'));
    }

    public function search(Request $request, $search)
    {
        $sanPham = $this->sanPham->getSearchSanPham($search, $this->paginate);

        return view('admin.ton_kho.partials.table', compact('sanPham'));
    }

    public function chiTiet(Request $request, $id)
    {
        return view('admin.ton_kho.show', compact('id'));
    }

    public function tableChiTiet(Request $request, $id)
    {
        $sanPham = $this->sanPham->getDetail($id, $this->paginate);

        return view('admin.ton_kho.partials.tableChiTiet', compact('sanPham'));
    }

    public function searchDetail(Request $request, $id, $search)
    {
        $sanPham = $this->sanPham->getSearchDetail($id, $search, $this->paginate);

        return view('admin.ton_kho.partials.tableChiTiet', compact('sanPham'));
    }
}
