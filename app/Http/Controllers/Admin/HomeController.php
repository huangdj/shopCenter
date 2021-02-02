<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderRemind;
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
        $reminds = OrderRemind::count(); // 订单提醒数量
        return view('admin.index', compact('reminds'));
    }
}
