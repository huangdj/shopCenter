<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Brand;
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

        // 品牌特卖
        $is_show_brand = Brand::where('is_show', true)->first();
        $brands = Brand::where('is_show', false)->get();

        // 所有商品
        $products = Product::where('is_onsale', true)->orderBy('created_at', 'desc')->take(4)->get();

        // 所有商品数量
        $total = Product::where('is_onsale', true)->count();
        return view('wechat.index', compact('adverts', 'notice', 'banner', 'products', 'is_show_brand', 'brands', 'total'));
    }

    /***
     * 滑动加载更多
     * @param Request $request
     * @return mixed
     */
    public function get_products(Request $request)
    {
        $page = $request->page;
        $num = 4;
        $products = Product::where('is_onsale', true)->skip($page)->limit($page, $num)->orderBy('created_at', 'desc')->get();
        return $products;
    }
}
