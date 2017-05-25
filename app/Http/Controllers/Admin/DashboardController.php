<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index(Request $request)
    {
        var_dump($request->session()->all());
        dd('后台首页，当前用户名：'.auth('admin')->user()->name);
    }
}
