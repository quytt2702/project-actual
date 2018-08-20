<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\LogRepository;

class LogController extends Controller
{
    protected $log;
    protected $paginate = 10;

    public function __construct(LogRepository $log)
    {
        $this->log = $log;
    }

    public function index()
    {
        return view('admin.log.index');
    }

    public function table()
    {
        $logs = $this->log->table($this->paginate);

        return view('admin.log.partials.table', compact('logs'));
    }
}
