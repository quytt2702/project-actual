<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Tab;
use App\Repositories\Contracts\TabRepository;
use App\Validators\Admin\Tabs\IdTabValidator;

class TabsController extends Controller
{
    protected $tabs;

    public function __construct(TabRepository $tabs)
    {
        $this->tabs = $tabs;
    }

    public function index(Request $request)
    {
        return view('admin.tabs.index');
    }

    public function table(Request $request)
    {
        $tabs = $this->tabs->all();

        return view('admin.tabs.partials.body-table', compact('tabs'));
    }

    public function editName(Request $request, $id, IdTabValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $tabs = $this->tabs->find($id);
        $tabs->ten_tab = $data['ten_tab'];
        $tabs->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }

    public function editStatus(Request $request, $id, IdTabValidator $validator)
    {
        // Validate
        $data = array_merge($request->all(), compact('id'));
        $validator->with($data)->passesOrFail();

        // Process
        $tabs = $this->tabs->find($id);
        $tabs->is_open = ($tabs->is_open === Tab::IS_OPEN['YES']) ? Tab::IS_OPEN['NO']:Tab::IS_OPEN['YES'];
        $tabs->save();

        return return_message('toastr', 'success', trans('notification.edit.success'));
    }
}
