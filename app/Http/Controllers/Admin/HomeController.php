<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        view()->share([
            '_admin' => 'am-active',
        ]);
    }
    /***
     * 后台首页
     */
    public function index()
    {
        return view('admin.index');
    }
}
