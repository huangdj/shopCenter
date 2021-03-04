<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Brand;
use App\Models\Notice;
use App\Models\Product;
use App\Models\Searche;
use App\Models\Theme;
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
        $notices = Notice::orderBy('id', 'desc')->get();

        // 广告图
        $banner = Advert::where('type', 2)->first();

        // 品牌特卖
        $left_brand = Brand::where('is_show', true)->first();
        $brands = Brand::where('is_show', false)->get();

        // 热门主题
        $left_theme = Theme::where('is_left', true)->first();
        $right_themes = Theme::where('is_right', true)->get();
        $bottom_themes = Theme::where('is_bottom', true)->get();

        // 所有商品
        $products = Product::where('is_onsale', true)->where('is_seckill', false)->orderBy('created_at', 'desc')->take(4)->get(); // 商品列表排除秒杀商品

        // 所有商品数量
        $total = Product::where('is_onsale', true)->where('is_seckill', false)->count();
        return view('wechat.index', compact('adverts', 'special_products', 'notices', 'banner', 'products', 'left_brand',
            'brands', 'total', 'left_theme', 'right_themes', 'bottom_themes'));
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
        $products = Product::where('is_onsale', true)->where('is_seckill', false)->skip($page)->limit($page, $num)->orderBy('created_at', 'desc')->get();
        return $products;
    }

    /***
     * 今日特价
     */
    public function special_products()
    {
        $special_products = Product::where('is_onsale', true)->where('is_seckill', false)->where('discount', '<>', '0.0')->orderBy('id', 'desc')->get();
        return view('wechat.special_products', compact('special_products'));
    }

    /***
     * 加载搜索页面
     */
    public function search()
    {
        // 最近搜索
        $least_words = Searche::where('customer_id', session('wechat.customer.id'))->orderBy('id', 'desc')->take(10)->get();

        // 热门搜索---根据搜索次数从高到低显示
        $hot_words = Searche::orderBy('total_count', 'desc')->get();
        return view('wechat.search', compact('least_words', 'hot_words'));
    }

    /***
     * 删除搜索记录
     */
    public function del_search()
    {
        Searche::where('customer_id', session('wechat.customer.id'))->delete();
    }
}
