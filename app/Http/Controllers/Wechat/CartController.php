<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function __construct()
    {
        view()->share(['_cart' => 'on']);
    }

    /***
     * 购物车首页
     */
    public function index()
    {
        return view('wechat.cart.index');
    }

    /***
     * 加入购物车
     * @param Request $request
     */
    public function store(Request $request)
    {
        return $request->all();
    }


}
