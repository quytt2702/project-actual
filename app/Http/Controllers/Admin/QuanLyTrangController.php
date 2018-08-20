<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Url;
use App\Entities\TmdtPage;
use App\Repositories\Contracts\UrlRepository;
use App\Repositories\Contracts\TmdtPageRepository;
use App\Repositories\Contracts\ChuyenMucRepository;
use App\Repositories\Contracts\TmdtSectionRepository;
use App\Repositories\Contracts\ChuyenMucSanPhamRepository;
use App\Repositories\Contracts\Admin\CaiDatNgonNguRepository;
use App\Validators\Admin\QuanLyTrang\StoreQuanLyTrangValidator;
use App\Validators\Admin\QuanLyTrang\UpdateQuanLyTrangValidator;

class QuanLyTrangController extends Controller
{
    protected $url;
    protected $tmdtPage;
    protected $tmdtSection;
    protected $caiDatNgonNgu;
    protected $chuyenMucBaiViet;
    protected $chuyenMucSanPham;
    protected $paginate = 10;

    public function __construct(
        UrlRepository $url,
        TmdtPageRepository $tmdtPage,
        TmdtSectionRepository $tmdtSection,
        ChuyenMucRepository $chuyenMucBaiViet,
        CaiDatNgonNguRepository $caiDatNgonNgu,
        ChuyenMucSanPhamRepository $chuyenMucSanPham
    ) {
        $this->url              = $url;
        $this->tmdtPage         = $tmdtPage;
        $this->tmdtSection      = $tmdtSection;
        $this->caiDatNgonNgu    = $caiDatNgonNgu;
        $this->chuyenMucBaiViet = $chuyenMucBaiViet;
        $this->chuyenMucSanPham = $chuyenMucSanPham;
    }

    public function index()
    {
        return view('admin.quan_ly_trang.index');
    }

    public function table()
    {
        $tmdtPage = $this->tmdtPage->getAll($this->paginate);

        return view('admin.quan_ly_trang.partials.list_page_table', compact('tmdtPage'));
    }

    public function add(Request $request)
    {
        $tmdtSection        = $this->tmdtSection->all();
        $chuyenMucSanPham   = $this->chuyenMucSanPham->all();
        $chuyenMucBaiViet   = $this->chuyenMucBaiViet->all();

        return view('admin.quan_ly_trang.add', compact('tmdtSection', 'chuyenMucBaiViet', 'chuyenMucSanPham'));
    }

    public function edit(Request $request, $id)
    {
        // Validate
        $tmdtPage = $this->tmdtPage->findById($id);
        if (empty($tmdtPage)) {
            return redirect()->route('admin.quan_ly_trang.index');
        }

        $tmdtSection = $this->tmdtSection->all();
        $chuyenMucSanPham = $this->chuyenMucSanPham->all();
        $chuyenMucBaiViet = $this->chuyenMucBaiViet->all();

        // Convert tmdtSection to id key
        $tmdtSectionKey = $this->tmdtSection->toIdKey($tmdtSection);

        return view('admin.quan_ly_trang.edit', compact('tmdtPage', 'tmdtSection', 'chuyenMucBaiViet', 'chuyenMucSanPham', 'tmdtSectionKey'));
    }

    public function themSection(Request $request, $code)
    {
        $index              = $request->index;
        $section            = $this->tmdtSection->findById($code);
        $chuyenMucSanPham   = $this->chuyenMucSanPham->all();
        $chuyenMucBaiViet   = $this->chuyenMucBaiViet->all();
        $strRandom          = str_random();

        return view('admin.quan_ly_trang.partials.section_item', compact('index', 'section', 'chuyenMucBaiViet', 'chuyenMucSanPham', 'strRandom'));
    }

    public function store(Request $request, StoreQuanLyTrangValidator $validator)
    {
        $data = $request->all();

        // Nếu không có data nào thì trả về lỗi
        if (empty($data['data'])) {
            return redirect()->route('admin.quan_ly_trang.add')->withErrors(['Bạn không có section nào']);
            ;
        }

        // Xử lý Array để parse JSON
        $parseData = [];
        foreach ($data['data'] as $item) {
            $item['danh_sach_slide']        = empty($item['danh_sach_slide']) ? []:array_keys($item['danh_sach_slide']);
            $item['danh_sach_chuyen_muc']   = empty($item['danh_sach_chuyen_muc']) ? []:array_keys($item['danh_sach_chuyen_muc']);
            $parseData[]                    = $item;
        }
        $data['data'] = $parseData;
        // Xong xử lý Array để parse JSON

        // Validate
        $validator->with($data)->passesOrFail();

        //  Process
        DB::beginTransaction();
        try {
            // Thêm Url vào bảng Url
            $this->url->create([
                'url_url' => $data['url'],
                'url_ten_loai' => Url::TEN_LOAI['TMDT'],
            ]);

            // Thêm vào bảng tmdt_page
            $user = Auth::guard('admin')->user();
            $this->tmdtPage->create([
                'ten_trang'         => $data['ten_trang'],
                'tags'              => $data['tags'],
                'url'               => $data['url'],
                'keywords'          => $data['keywords'],
                'email_nguoi_tao'   => $user->email,
                'sections'          => json_encode($parseData),
            ]);

            DB::commit();

            return redirect()->route('admin.quan_ly_trang.index');
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());

            DB::rollback();
        }
    }

    public function update(Request $request, $id, UpdateQuanLyTrangValidator $validator)
    {
        $data = $request->all();

        // Nếu không có data nào thì trả về lỗi
        if (empty($data['data'])) {
            return redirect()->route('admin.quan_ly_trang.edit')->withErrors(['Bạn không có section nào']);
        }

        // Xử lý Array để parse JSON
        $parseData = [];
        foreach ($data['data'] as $item) {
            $item['danh_sach_slide']        = empty($item['danh_sach_slide']) ? []:array_keys($item['danh_sach_slide']);
            $item['danh_sach_chuyen_muc']   = empty($item['danh_sach_chuyen_muc']) ? []:array_keys($item['danh_sach_chuyen_muc']);
            $parseData[]                    = $item;
        }
        $data['data'] = $parseData;
        // Xong xử lý Array để parse JSON

        // Validate
        $validator->with($data)->passesOrFail();

        //  Process
        DB::beginTransaction();
        try {
            // Logic kiểm tra
            $tmdtPage = $this->tmdtPage->findById($id);
            $checkUrl = $this->url->findByUrl($data['url']);

            if (!empty($checkUrl) && $tmdtPage->url !== $checkUrl->url_url) {
                return redirect()->route('admin.quan_ly_trang.edit', compact('id'))->withErrors(['Url đã tồn tại']);
            }

            // Kiểm tra url đã có chưa, nếu chưa thì tạo mới
            $url = $this->url->findByUrl($tmdtPage->url);
            $url->url_url = $data['url'];
            $url->save();

            // Sửa Url vào bảng Url
            $this->url->create([
                'url_url' => $data['url'],
                'url_ten_loai' => Url::TEN_LOAI['TMDT'],
            ]);

            // Thêm vào bảng tmdt_page
            $user = Auth::guard('admin')->user();
            $tmdtPage->ten_trang        = $data['ten_trang'];
            $tmdtPage->tags             = $data['tags'];
            $tmdtPage->url              = $data['url'];
            $tmdtPage->keywords         = $data['keywords'];
            $tmdtPage->email_nguoi_tao  = $user->email;
            $tmdtPage->sections         = json_encode($parseData);
            $tmdtPage->save();

            DB::commit();

            return redirect()->route('admin.quan_ly_trang.index');
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());

            DB::rollback();
        }
    }

    public function changeView(Request $request, $id)
    {
        // Validate here
        $data = array_merge($request->all(), compact('id'));

        $tmdtPage = $this->tmdtPage->findById($id);

        // Tim link trang chu
        $linkTrangChu = $this->caiDatNgonNgu->findLinkTrangChu($tmdtPage->url);
        if (!empty($linkTrangChu)) {
            return return_error('Không thể tắt hiển thị link trang chủ');
        }
        $tmdtPage->is_view = ($tmdtPage->is_view === TmdtPage::IS_VIEW['YES']) ? TmdtPage::IS_VIEW['NO']:TmdtPage::IS_VIEW['YES'];
        $tmdtPage->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->input_search;

        $tmdtPage = $this->tmdtPage->getAllWithSearch($search, $this->paginate);

        return view('admin.quan_ly_trang.partials.list_page_table', compact('tmdtPage'));
    }

    public function destroy(Request $request, $id)
    {
        $url = $this->tmdtPage->findById($id);

        $this->url->deleteWhere(['url_url' => $url->url]);
        $this->tmdtPage->deleteWhere(['url' => $url->url]);

        return return_message('toastr', 'success', trans('notification.delete.success'));
    }
}
