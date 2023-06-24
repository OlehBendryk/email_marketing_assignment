<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;


class BaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }
}
