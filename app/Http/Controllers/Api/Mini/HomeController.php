<?php

namespace App\Http\Controllers\Api\Mini;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /***
     * 前端首页
     */
    public function index()
    {
        // 轮播图
        $adverts = Advert::where('type', 3)->orderBy('id', 'desc')->get();

        // 焦点图
        $banners = Advert::where('type', 4)->orderBy('id', 'desc')->get();

        // 所有商品
        $products = Product::where('is_onsale', true)->where('is_seckill', false)->orderBy('created_at', 'desc')->get();

        return response()->json(compact('adverts', 'banners', 'products'));

    }
}
