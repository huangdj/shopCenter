<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 微信接口路由
Route::namespace('Wechat')->group(function () {
    Route::any('wechat', 'WechatController@serve');
});

// api接口路由
Route::namespace('Api')->group(function () {
    Route::get('sex_total', 'ApiController@sex_total');
    Route::get('sales_count', 'ApiController@sales_count');
    Route::get('sales_amount', 'ApiController@sales_amount');
});

/***
 * 前后端分离，后台接口路由
 */
Route::namespace('Api')->group(function () {
    Route::resource('photos', 'PhotoController')->only('store');  // 上传图片

    Route::prefix('admin')->namespace('Admin')->group(function () {
        Route::post('register', 'AdminController@register');  // 后台注册
        Route::post('login', 'AdminController@login');  // 后台登录
    });

    Route::prefix('admin')->namespace('Admin')->middleware('auth:admins')->group(function () {
        Route::get('/', 'HomeController@index');  // 后台首页
        Route::prefix('brands')->group(function () {
            Route::delete('delete_all', 'BrandController@delete_all');
            Route::patch('change_attr', 'BrandController@change_attr');
        });
        Route::resource('brands', 'BrandController')->except('create', 'show'); // 品牌管理
        Route::resource('categories', 'CategoryController')->except('create', 'show'); // 商品分类
        Route::resource('products', 'ProductController')->except('create', 'show'); // 商品管理
        Route::resource('adverts', 'AdvertController')->except('create', 'show'); // 广告管理

        // 订单统计
        Route::get('sales_count', 'CountController@sales_count');
        Route::get('sales_amount', 'CountController@sales_amount');

    });

    /***
     * 小程序接口
     */
    Route::any('auth', 'MiniController@auth');  // 小程序登录

    Route::prefix('mini')->namespace('Mini')->group(function () {
        Route::get('/', 'HomeController@index'); //首页接口

        Route::prefix('product')->group(function () {
            Route::get('category', 'ProductController@category'); //商品分类
            Route::get('/', 'ProductController@index'); //商品列表
            Route::get('{id}', 'ProductController@show'); //商品详情
        });

        //购物车
        Route::prefix('cart')->middleware('auth:users')->group(function () {
            Route::post('/', 'CartController@store');
            Route::get('/', 'CartController@index');
            Route::delete('/', 'CartController@destroy');
            Route::put('/{id}', 'CartController@change_num');
        });

        // 订单
        Route::prefix('order')->middleware('auth:users')->group(function () {
            Route::get('checkout', 'OrderController@checkout'); // 去结算
            Route::post('/', 'OrderController@store'); // 下单
            Route::get('show_pay/{id}', 'OrderController@show_pay'); // 显示下单成功页面
        });

        //地址管理
        Route::prefix('address')->middleware('auth:users')->group(function () {
            //设置默认地址
            Route::put('/default_address/{id}', 'AddressController@default_address');
        });
        Route::resource('address', 'AddressController')->except('create', 'show');
    });
});


