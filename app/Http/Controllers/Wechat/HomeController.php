<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Notice;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function __construct()
    {
        view()->share(['_home' => 'on']);
    }

    /***
     * 首页
     */
    public function index()
    {
        // 轮播图
        $adverts = Advert::where('type', true)->orderBy('id', 'desc')->get();

        // 热门资讯
        $notice = Notice::orderBy('id', 'desc')->first();

        // 广告图
        $banner = Advert::where('type', 2)->first();

        // 所有商品
        $products = Product::where('is_onsale', true)->orderBy('is_top', 'desc')->get();
        return view('wechat.index', compact('adverts', 'notice', 'banner', 'products'));
    }
}
