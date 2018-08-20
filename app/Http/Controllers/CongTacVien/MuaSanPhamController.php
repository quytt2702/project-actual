<?php

namespace App\Http\Controllers\CongTacVien;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\TabRepository;
use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\GioHangRepository;
use App\Validators\Admin\SanPham\DestroySanPhamValidator;

class MuaSanPhamController extends Controller
{
    protected $tab;
    protected $gioHang;
    protected $sanPham;
    protected $paginate = 8;

    public function __construct(
        TabRepository $tab,
        GioHangRepository $gioHang,
        SanPhamRepository $sanPham
    ) {
        $this->tab      = $tab;
        $this->gioHang  = $gioHang;
        $this->sanPham  = $sanPham;
    }

    public function index(Request $request)
    {
        return view('cong_tac_vien.mua_san_pham.index');
    }

    public function table(Request $request)
    {
        $sanPham = $this->sanPham->getAllSanPhamWithChuyenMucWithCaiDatNgonNgu($this->paginate);

        return view('cong_tac_vien.mua_san_pham.partials.body-table', compact('sanPham'));
    }

    public function show(Request $request, $id)
    {
        // Process
        $sanPham    = $this->sanPham->getByIdsWithChuyenMucWithCaiDatNgonNgu([$id])[0];
        $tabs       = $this->tab->all();

        if (empty($sanPham)) {
            return redirect()->route('cong_tac_vien.mua_san_pham.index');
        }

        return view('cong_tac_vien.mua_san_pham.show', compact('sanPham', 'tabs'));
    }

    public function modal(Request $request, $id, DestroySanPhamValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        $sanPham    = $this->sanPham->findById($id);

        return view('cong_tac_vien.mua_san_pham.partials.modals.gio_hang', compact('sanPham'));
    }

    public function muaSam(Request $request, $id, DestroySanPhamValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        $user = Auth::guard('cong_tac_vien')->user();

        // Process
        $sanPham = $this->sanPham->findById($id);
        $gioHang = $this->gioHang->findByEmail($user->email);

        // Nếu bảng giỏ hàng chưa có thì tạo mới
        if (empty($gioHang)) {
            $this->gioHang->create([
                'gio_hang_email' => $user->email,
                'gio_hang_noi_dung' => json_encode([[
                    'san_pham_id' => $id,
                    'san_pham_so_luong' => $data['so_luong'],
                    'san_pham_ten' => $sanPham->san_pham_ten,
                ]]),
            ]);
        } else {
            // Nếu sản phẩm tạm trong DB đã có thì chạy foreach
            // để tìm ra sản phẩm đó có trùng không
            $is_new = true;
            $sanPhamTamDB   = json_decode($gioHang->gio_hang_noi_dung);
            $sanPhamTamView = [
                'san_pham_id' => $id,
                'san_pham_so_luong' => $data['so_luong'],
                'san_pham_ten' => $sanPham->san_pham_ten,
            ];

            if (!empty($sanPhamTamDB)) {
                foreach ($sanPhamTamDB as $index => $item) {
                    // Nếu đã có thì không tạo mới
                    if ($item->san_pham_id === $id) {
                        $is_new = false;
                        $sanPhamTamDB[$index]->san_pham_so_luong = $data['so_luong'];
                        break;
                    }
                }
            }

            // Nếu tìm không có trong DB thì tạo mới
            if ($is_new) {
                $sanPhamTamDB[] = $sanPhamTamView;
            }

            $gioHang->gio_hang_noi_dung = json_encode($sanPhamTamDB);
            $gioHang->save();
        }
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $sanPham = $this->sanPham->allWithSearchWithChuyenMucWithCaiDatNgonNgu($search, $this->paginate);

        return view('cong_tac_vien.mua_san_pham.partials.body-table', compact('sanPham'));
    }
}
