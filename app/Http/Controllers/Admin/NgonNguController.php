<?php

namespace App\Http\Controllers\Admin;

use DB;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\NgonNgu;
use App\Repositories\Contracts\UrlRepository;
use App\Repositories\Contracts\NgonNguRepository;
use App\Validators\Admin\NgonNgu\UpdateNgonNguValidator;

class NgonNguController extends Controller
{
    protected $url;
    protected $ngonNgu;

    public function __construct(
        UrlRepository $url,
        NgonNguRepository $ngonNgu
    ) {
        $this->url     = $url;
        $this->ngonNgu = $ngonNgu;
    }

    public function index(Request $request)
    {
        return view('admin.ngon_ngu.index');
    }

    public function table(Request $request)
    {
        $ngonNgu = $this->ngonNgu->all();

        return view('admin.ngon_ngu.partials.body-table', compact('ngonNgu'));
    }

    public function store(Request $request)
    {
        // Validate here
        $data = $request->all();
        DB::beginTransaction();
        try {
            foreach ($data as $item) {
                $ngonNgu = $this->ngonNgu->findById($item['id']);
                $ngonNgu->link_web = $item['url'];
                $ngonNgu->save();
            }

            DB::commit();
        } catch (Exception $ex) {
            log_system($ex->getMessage());

            DB::rollback();
        }
    }

    public function active(Request $request, UpdateNgonNguValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        // Process
        $ngonNgu = $this->ngonNgu->find($data['id']);
        $ngonNgu->is_open = NgonNgu::IS_OPEN['YES'];
        $ngonNgu->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function notActive(Request $request, UpdateNgonNguValidator $validator)
    {
        // Validate
        $data = $request->all();
        $validator->with($data)->passesOrFail();

        $ngonNgu = $this->ngonNgu->getIsOpen();
        if (count($ngonNgu) <= 1) {
            return validate_errors(['Bạn phải có ít nhất 1 ngôn ngữ']);
        }

        // Process
        $ngonNgu = $this->ngonNgu->find($data['id']);
        $ngonNgu->is_open = NgonNgu::IS_OPEN['NO'];
        $ngonNgu->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function search(Request $request, $key, $idNgonNgu)
    {
        if ($key === '') {
            return [];
        }

        $urls = $this->url->searchUrlWithIdNgonNgu($key, $idNgonNgu)->toArray();

        return count($urls) > 0 ? $urls:[];
    }
}
