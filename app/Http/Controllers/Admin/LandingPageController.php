<?php

namespace App\Http\Controllers\Admin;

use DB;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Entities\Url;
use App\Entities\Landing\ActionImage;
use App\Entities\Landing\LandingTheme;
use App\Entities\Landing\SectionQuote;
use App\Entities\Landing\ThemeSection;
use App\Entities\Landing\LandingSection;
use App\Entities\Landing\LandingThemeFooter;
use App\Entities\Landing\LandingSectionInfo;
use App\Repositories\Contracts\SanPhamRepository;
use App\Repositories\Contracts\KhachHangRepository;
use App\Repositories\Contracts\HoaDonBanHangRepository;
use App\Repositories\Contracts\KhachHangLandingPageRepository;
use App\Validators\Admin\LandingPage\CreateLandingPageValidator;
use App\Repositories\Contracts\ChiTietHoaDonBanSanPhamRepository;

class LandingPageController extends Controller
{
    const UPLOAD_PATH = 'landing_page';

    const SECTION_FIELDS = [
        'title', 'subtitle', 'content', 'video_url',
    ];
    const FORM_FIELDS = [
        'show_full_name', 'show_email', 'show_phone', 'show_notes', 'show_extra_req',
    ];

    protected $sanPham;
    protected $khachHang;
    protected $hoaDonBanHang;
    protected $khachHangLandingPage;
    protected $chiTietHoaDonBanSanPham;
    protected $paginate = 10;

    public function __construct(
        SanPhamRepository $sanPham,
        KhachHangRepository $khachHang,
        HoaDonBanHangRepository $hoaDonBanHang,
        KhachHangLandingPageRepository $khachHangLandingPage,
        ChiTietHoaDonBanSanPhamRepository $chiTietHoaDonBanSanPham
    ) {
        $this->sanPham                  = $sanPham;
        $this->khachHang                = $khachHang;
        $this->hoaDonBanHang            = $hoaDonBanHang;
        $this->khachHangLandingPage     = $khachHangLandingPage;
        $this->chiTietHoaDonBanSanPham  = $chiTietHoaDonBanSanPham;
    }

    public function index(Request $request)
    {
        $themes = LandingTheme::latest()->paginate(10);

        return view('admin.landing_page.index', compact('themes'));
    }

    public function create(Request $request)
    {
        $sections = ThemeSection::all();
        $sanPham = $this->sanPham->all();

        return view('admin.landing_page.create', compact('sections', 'sanPham'));
    }

    public function preview(LandingTheme $theme)
    {
        $theme->load('footer', 'sections', 'menuItems');

        return view('admin.landing_page.themes.ca.preview', compact('theme'));
    }

    public function postPreview(Request $request)
    {
        if (!$request->has('data') || !$request->has('info')) {
            return redirect()->route('admin.landing_page.index');
        }

        $data = $request->data;
        $menu = $request->get('menu', []);
        $footer = $request->footer ?: [];

        DB::beginTransaction();

        $info = $request->info;
        if (array_key_exists('logo', $info)) {
            $info['logo'] = url(
                'storage/' . $info['logo']->store(static::UPLOAD_PATH)
            );
        }
        // Create new theme
        $theme = LandingTheme::create($info);

        Url::create([
            'url_url' => $theme->url,
            'url_ten_loai' => Url::TEN_LOAI['LANDING_PAGE'],
        ]);

        if (!empty($footer)) {
            $newFooter = new LandingThemeFooter;
            $newFooter->landing_theme_id = $theme->id;

            if (array_key_exists('logo', $footer)) {
                $newFooter->logo = url(
                    'storage/' . $footer['logo']->store(static::UPLOAD_PATH)
                );
            }

            foreach (LandingThemeFooter::INPUT_FIELDS as $footerField) {
                if (array_key_exists($footerField, $footer)) {
                    $newFooter->{$footerField} = $footer[$footerField];
                }
            }

            $newFooter->save();
        }

        try {
            $position = 1;
            foreach ($data as $hash => $sectionData) {
                $newSection = new LandingSection;

                $newSection->position = $position;
                $newSection->theme_id = $theme->id;
                $newSection->hash = $hash;
                $newSection->code = $sectionData['code'];
                $newSection->background_color = @$sectionData['background_color'];
                $newSection->menu_title = @$menu[$hash];

                foreach (static::SECTION_FIELDS as $sectionField) {
                    if (array_key_exists($sectionField, $sectionData)) {
                        $newSection->{$sectionField} = $sectionData[$sectionField];
                    }
                }

                // Store image_url
                if (array_key_exists('image_url', $sectionData) &&
                    !empty($imageUrl = $sectionData['image_url'])
                ) {
                    $newSection->image_url = url(
                        'storage/' . $imageUrl->store(static::UPLOAD_PATH)
                    );
                }

                // Save background-image
                if (array_key_exists('background_image', $sectionData) &&
                    !empty($backgroundImage = $sectionData['background_image'])
                ) {
                    $newSection->background_image = url(
                        'storage/' . $backgroundImage->store(static::UPLOAD_PATH)
                    );
                }

                if (array_key_exists('countdown', $sectionData) &&
                    !empty($countdown = $sectionData['countdown'])
                ) {
                    switch ($countdown['type']) {
                        case 'end_time':
                            if (empty($countdown['date']) || empty($countdown['time'])) {
                                break;
                            }
                            $date = $countdown['date'];
                            list($hour, $mins) = explode(':', $countdown['time']);

                            $combinedTime = "{$date} {$hour}:{$mins}:00";

                            $newSection->countdown_type = $countdown['type'];
                            $newSection->countdown_time = $combinedTime;
                            break;

                        case 'loop':
                            $hour = (int) $countdown['hour'];
                            $mins = (int) $countdown['minute'];
                            $secs = (int) $countdown['second'];

                            $newSection->countdown_type = $countdown['type'];
                            $newSection->countdown_time = ($hour * 3600) + ($mins * 60) + ($secs);
                            break;
                    }
                }

                $newSection->save();

                $position += 1;

                // Save links
                if (array_key_exists('links', $sectionData) &&
                    !empty($links = $sectionData['links']) &&
                    array_key_exists('content', $links) &&
                    array_key_exists('url', $links) &&
                    count($links['content']) === count($links['url'])
                ) {
                    foreach ($links['content'] as $index => $content) {
                        $url = $links['url'][$index];

                        if (! empty($content)) {
                            $newSection->links()->create(
                                array_merge(
                                    ['position' => $index],
                                    compact('url', 'content')
                                )
                            );
                        }
                    }
                }

                // Icon Contents
                if (array_key_exists('icon_contents', $sectionData) &&
                    !empty($iconContents = $sectionData['icon_contents']) &&
                    array_key_exists('icon', $iconContents) &&
                    array_key_exists('title', $iconContents) &&
                    array_key_exists('content', $iconContents) &&
                    count($iconContents['icon']) == count($iconContents['title']) &&
                    count($iconContents['title']) == count($iconContents['content'])
                ) {
                    foreach ($iconContents['icon'] as $index => $icon) {
                        $icon = 'fa ' . $icon;
                        $title = $iconContents['title'][$index];
                        $content = $iconContents['content'][$index];

                        $newSection->iconContents()->create(
                            array_merge(
                                ['position' => $index],
                                compact('icon', 'title', 'content')
                            )
                        );
                    }
                }

                // Section Form
                if (array_key_exists('form', $sectionData) &&
                    !empty($form = $sectionData['form'])
                ) {
                    $info = new LandingSectionInfo;

                    $needToCreate = false;
                    foreach (static::FORM_FIELDS as $field) {
                        if (array_key_exists($field, $form) &&
                            array_key_exists('text_' . substr($field, 5), $form)
                        ) {
                            $needToCreate = true;
                            $info->{$field} = 1;
                            $info->{'text_' . substr($field, 5)} = $form['text_' . substr($field, 5)];
                        }
                    }

                    if ($needToCreate) {
                        $info->section_id = $newSection->id;
                        $info->save();
                    }
                }

                // Action Images
                if (array_key_exists('action_images', $sectionData) &&
                    !empty($actionImages = $sectionData['action_images'])
                ) {
                    if (array_key_exists('url', $actionImages) &&
                        array_key_exists('title', $actionImages) &&
                        array_key_exists('subtitle', $actionImages) &&
                        array_key_exists('content', $actionImages) &&
                        count($actionImages['url']) == count($actionImages['title']) &&
                        count($actionImages['title']) == count($actionImages['subtitle']) &&
                        count($actionImages['subtitle']) == count($actionImages['content'])
                    ) {
                        foreach ($actionImages['url'] as $index => $url) {
                            if (empty(@$actionImages['url'][$index]) &&
                                empty(@$actionImages['title'][$index]) &&
                                empty(@$actionImages['subtitle'][$index]) &&
                                empty(@$actionImages['content'][$index]) &&
                                empty(@$actionImages['image_url'][$index])
                            ) {
                                continue;
                            }

                            $actionImage = new ActionImage;

                            $actionImage->section_id = $newSection->id;
                            $actionImage->url = $url;
                            $actionImage->title = $actionImages['title'][$index];
                            $actionImage->subtitle = $actionImages['subtitle'][$index];
                            $actionImage->content = $actionImages['content'][$index];
                            $actionImage->position = $index;
                            if (! empty($actionImages['image_url'][$index])) {
                                $actionImage->image_url = url(
                                    'storage/' . $actionImages['image_url'][$index]->store(static::UPLOAD_PATH)
                                );
                            }

                            $actionImage->save();
                        }
                    } else {
                        foreach ($actionImages['image_url'] as $index => $url) {
                            $actionImage = new ActionImage;

                            $actionImage->section_id = $newSection->id;
                            $actionImage->position = $index;
                            if (!empty($url)) {
                                $actionImage->image_url = url(
                                    'storage/' . $url->store(static::UPLOAD_PATH)
                                );

                                $actionImage->save();
                            }
                        }
                    }
                }

                if (array_key_exists('quotes', $sectionData) &&
                    !empty($quotes = $sectionData['quotes']) &&
                    array_key_exists('author', $quotes) &&
                    array_key_exists('content', $quotes) &&
                    array_key_exists('author_image_url', $quotes)
                ) {
                    foreach ($quotes['author'] as $index => $author) {
                        if (empty(@$quotes['author'][$index]) &&
                            empty(@$quotes['content'][$index]) &&
                            empty(@$quotes['author_image_url'][$index])
                        ) {
                            continue;
                        }

                        $newQuote = new SectionQuote;

                        $newQuote->section_id = $newSection->id;
                        $newQuote->author = $author;
                        $newQuote->content = @$quotes['content'][$index];
                        $newQuote->position = $index;

                        if (! empty($quotes['author_image_url'][$index])) {
                            $newQuote->author_image_url = url(
                                'storage/' . $quotes['author_image_url'][$index]->store(static::UPLOAD_PATH)
                            );
                        }

                        $newQuote->save();
                    }
                }

                DB::commit();
            }
        } catch (Exception $ex) {
            \Log::info($ex->getMessage());
            \Log::info($ex->getTraceAsString());

            DB::rollBack();

            return redirect()->route('admin.landing_page.index');
        }

        return redirect()->route('admin.landing_page.preview', $theme->id);
    }

    public function edit(Request $request, LandingTheme $theme)
    {
        $sections = ThemeSection::all();
        $theme->load('footer', 'sections.actionImages');
        $sanPham = $this->sanPham->all();

        return view('admin.landing_page.edit', compact('theme', 'sections', 'sanPham'));
    }

    public function update(Request $request, LandingTheme $theme)
    {
        if (!$request->has('data') || !$request->has('info')) {
            return redirect()->route('admin.landing_page.index');
        }

        $data = $request->data ?: [];
        $menu = $request->menu ?: [];
        $info = $request->info ?: [];
        $footer = $request->footer ?: [];
        DB::beginTransaction();

        unset($info['id']);
        if (array_key_exists('logo', $info)) {
            $info['logo'] = url(
                'storage/' . $info['logo']->store(static::UPLOAD_PATH)
            );
        }

        if (array_key_exists('logo_old', $info)) {
            $info['logo'] = $info['logo_old'];
        }

        Url::where([
            'url_url' => $theme->url,
            'url_ten_loai' => Url::TEN_LOAI['LANDING_PAGE'],
        ])->delete();

        $theme->update($info);

        Url::create([
            'url_url' => $theme->url,
            'url_ten_loai' => Url::TEN_LOAI['LANDING_PAGE'],
        ]);

        try {
            $theme->sections()->delete();

            $position = 1;

            foreach ($data as $hash => $sectionData) {
                $newSection = new LandingSection;

                $newSection->position = $position;
                $newSection->theme_id = $theme->id;
                $newSection->hash = $hash;
                $newSection->code = $sectionData['code'];

                // Store Menu
                if (array_key_exists($hash, $menu)) {
                    $newSection->menu_title = $menu[$hash];
                }

                foreach (static::SECTION_FIELDS as $sectionField) {
                    if (array_key_exists($sectionField, $sectionData)) {
                        $newSection->{$sectionField} = $sectionData[$sectionField];
                    }
                }

                // Store image_url
                if (array_key_exists('image_url', $sectionData) &&
                    !empty($imageUrl = $sectionData['image_url'])
                ) {
                    $newSection->image_url = url(
                        'storage/' . $imageUrl->store(static::UPLOAD_PATH)
                    );
                } elseif (array_key_exists('image_url_old', $sectionData)) {
                    $newSection->image_url = $sectionData['image_url_old'];
                }

                // Save background-image
                if (array_key_exists('background_image', $sectionData) &&
                    !empty($backgroundImage = $sectionData['background_image'])
                ) {
                    $newSection->background_image = url(
                        'storage/' . $backgroundImage->store(static::UPLOAD_PATH)
                    );
                } elseif (array_key_exists('background_image_old', $sectionData)) {
                    $newSection->background_image = $sectionData['background_image_old'];
                }

                if (array_key_exists('countdown', $sectionData) &&
                    !empty($countdown = $sectionData['countdown'])
                ) {
                    switch ($countdown['type']) {
                        case 'end_time':
                            if (empty($countdown['date']) || empty($countdown['time'])) {
                                break;
                            }
                            $date = $countdown['date'];
                            list($hour, $mins) = explode(':', $countdown['time']);

                            $combinedTime = "{$date} {$hour}:{$mins}:00";

                            $newSection->countdown_type = $countdown['type'];
                            $newSection->countdown_time = $combinedTime;
                            break;

                        case 'loop':
                            $hour = (int) $countdown['hour'];
                            $mins = (int) $countdown['minute'];
                            $secs = (int) $countdown['second'];

                            $newSection->countdown_type = $countdown['type'];
                            $newSection->countdown_time = ($hour * 3600) + ($mins * 60) + ($secs);
                            break;
                    }
                }

                $newSection->save();

                $position += 1;

                // Save links
                if (array_key_exists('links', $sectionData) &&
                    !empty($links = $sectionData['links']) &&
                    array_key_exists('content', $links) &&
                    array_key_exists('url', $links) &&
                    count($links['content']) === count($links['url'])
                ) {
                    foreach ($links['content'] as $index => $content) {
                        $url = $links['url'][$index];

                        if (! empty($content)) {
                            $newSection->links()->create(
                                array_merge(
                                    ['position' => $index],
                                    compact('url', 'content')
                                )
                            );
                        }
                    }
                }

                // Icon Contents
                if (array_key_exists('icon_contents', $sectionData) &&
                    !empty($iconContents = $sectionData['icon_contents']) &&
                    array_key_exists('icon', $iconContents) &&
                    array_key_exists('title', $iconContents) &&
                    array_key_exists('content', $iconContents) &&
                    count($iconContents['icon']) == count($iconContents['title']) &&
                    count($iconContents['title']) == count($iconContents['content'])
                ) {
                    foreach ($iconContents['icon'] as $index => $icon) {
                        $icon = 'fa ' . $icon;
                        $title = $iconContents['title'][$index];
                        $content = $iconContents['content'][$index];

                        $newSection->iconContents()->create(
                            array_merge(
                                ['position' => $index],
                                compact('icon', 'title', 'content')
                            )
                        );
                    }
                }

                // Section Form
                if (array_key_exists('form', $sectionData) &&
                    !empty($form = $sectionData['form'])
                ) {
                    $info = new LandingSectionInfo;

                    $needToCreate = false;
                    foreach (static::FORM_FIELDS as $field) {
                        if (array_key_exists($field, $form) &&
                            array_key_exists('text_' . substr($field, 5), $form)
                        ) {
                            $needToCreate = true;
                            $info->{$field} = 1;
                            $info->{'text_' . substr($field, 5)} = $form['text_' . substr($field, 5)];
                        }
                    }

                    if ($needToCreate) {
                        $info->section_id = $newSection->id;
                        $info->save();
                    }
                }

                // Action Images
                if (array_key_exists('action_images', $sectionData) &&
                    !empty($actionImages = $sectionData['action_images'])
                ) {
                    \Log::info('SECTION CODE: ' . $sectionData['code']);
                    \Log::info(print_r($actionImages, true));
                    foreach ($actionImages['title'] as $index => $title) {
                        $needToCreate = false;

                        $actionImage = new ActionImage;

                        foreach (['url', 'title', 'subtitle', 'content', 'image_url_old', 'image_url'] as $name) {
                            if (! empty(@$actionImages[$name][$index])) {
                                $needToCreate = true;

                                if ($name == 'image_url_old') {
                                    $actionImage->image_url = $actionImages[$name][$index];
                                } elseif ($name == 'image_url' && empty($actionImage->image_url)) {
                                    $actionImage->image_url = url(
                                        'storage/' . $actionImages[$name][$index]->store(static::UPLOAD_PATH)
                                    );
                                } elseif ($actionImages[$name][$index] instanceof UploadedFile) {
                                    $actionImage->{$name} = url(
                                        'storage/' . $actionImages[$name][$index]->store(static::UPLOAD_PATH)
                                    );
                                } else {
                                    $actionImage->{$name} = $actionImages[$name][$index];
                                }
                            }
                        }

                        if ($needToCreate) {
                            $actionImage->section_id = $newSection->id;
                            $actionImage->save();
                        }
                    }
                }

                if (array_key_exists('quotes', $sectionData) &&
                    ! empty($quotes = $sectionData['quotes'])
                ) {
                    foreach ($quotes['author'] as $index => $quote) {
                        $needToCreateQuote = false;

                        $newQuote = new SectionQuote;

                        foreach (['author', 'content', 'author_image_url_old', 'author_image_url'] as $name) {
                            if (! empty(@$quotes[$name][$index])) {
                                $needToCreateQuote = true;

                                if ($name == 'author_image_url_old') {
                                    $newQuote->author_image_url = $quotes[$name][$index];
                                } elseif ($name == 'author_image_url' && empty($newQuote->author_image_url)) {
                                    $newQuote->author_image_url = url(
                                        'storage/' . $quotes[$name][$index]->store(static::UPLOAD_PATH)
                                    );
                                } else {
                                    $newQuote->{$name} = $quotes[$name][$index];
                                }
                            }
                        }

                        if ($needToCreateQuote) {
                            $newQuote->section_id = $newSection->id;
                            $newQuote->save();
                        }
                    }
                }

                DB::commit();
            }

            $theme->update([
                'updated_at' => Carbon::now(),
            ]);
        } catch (\Exception $ex) {
            \Log::info($ex->getMessage());
            \Log::info($ex->getTraceAsString());

            DB::rollBack();

            return redirect()->route('admin.landing_page.index');
        }

        return redirect()->route('admin.landing_page.index');
    }

    public function destroy(Request $request, LandingTheme $theme)
    {
        DB::beginTransaction();

        try {
            $url = $theme->url;

            $theme->sections()->delete();
            $theme->delete();

            Url::where([
                'url_url' => $theme->url,
                'url_ten_loai' => Url::TEN_LOAI['LANDING_PAGE'],
            ])->delete();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                'message' => 'Đã xảy ra lỗi. Vui lòng thử lại sau',
            ], 400);
        }
    }

    public function getSectionView(Request $request)
    {
        if ($request->has('code')) {
            try {
                $data = $request->except('code');
                $view = view($request->code, $data)->render();

                return response()->json(compact('view'));
            } catch (\Exception $ex) {
                return response()->json([
                    'success' => false,
                    'message' => $ex->getMessage(),
                ], 400);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Code is required',
        ], 400);
    }

    public function checkUrl(Request $request)
    {
        if (empty($url = $request->url)) {
            return response()->json([
                'error' => true,
                'message' => 'Url này không hợp lệ.',
            ], 400);
        }

        $count = Url::where('url_url', $url ?: '')
            ->where('url_ten_loai', Url::TEN_LOAI['LANDING_PAGE'])
            ->count();

        if ($count > 0) {
            return response()->json([
                'error' => true,
                'message' => 'Url này đã tồn tại.',
            ], 400);
        }

        return response()->json([
            'error' => false,
            'message' => 'Url hợp lệ',
        ]);
    }

    public function indexKhachHang()
    {
        return view('admin.landing_page.index_khach_hang');
    }

    public function tableKhachHang()
    {
        $khachHang = $this->khachHangLandingPage->getKhachHangLandingPage($this->paginate);

        return view('admin.landing_page.partials.table_khach_hang', compact('khachHang'));
    }

    public function indexHoaDon()
    {
        return view('admin.landing_page.index_hoa_don_ban_hang');
    }

    public function tableHoaDon()
    {
        $hoaDonBanHang = $this->hoaDonBanHang->getHoaDonBanHangLandingPage($this->paginate);

        return view('admin.landing_page.partials.table_hoa_don_ban_hang', compact('hoaDonBanHang'));
    }

    public function showHoaDon($id)
    {
        $chiTietHoaDonBanSanPham = $this->chiTietHoaDonBanSanPham->getByIdHoaDonBanHangWithSanPham($id);

        return view('admin.landing_page.partials.modal_hoa_don_ban_hang', compact('chiTietHoaDonBanSanPham'));
    }

    public function inHoaDonBanHang($hash)
    {
        $pdf = \App::make('dompdf.wrapper');

        \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        $info = [
            'hoa_don_ban_hang' => $this->hoaDonBanHang->findByHashWithKhachHangLandingPage($hash),
            'chi_tiet_hoa_don' => $this->chiTietHoaDonBanSanPham->getChiTietHoaDonWithKhachHang($hash)
        ];

        $pdf->loadHTML(view('phieu_nhap_xuat.phieu_xuat', compact('info'))->render())->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
