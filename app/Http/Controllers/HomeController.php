<?php

namespace App\Http\Controllers;

use App\Validators\Articles\CreateArticleValidator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return app(\App\Http\Controllers\UrlController::class)->navigate($request, '');
        // return view('landing_page');
    }

    public function check(Request $request)
    {
        $validator = app(CreateArticleValidator::class);

        $validator->with($request->all())->passesOrFail();

        return 'okay';
    }
}
