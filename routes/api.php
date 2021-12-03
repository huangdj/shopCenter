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
});


