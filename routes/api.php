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

    Route::prefix('admin')->namespace('Admin')->group(function () {
        Route::post('register', 'AdminController@register');  // 后台注册
        Route::post('login', 'AdminController@login');  // 后台登录
    });

    Route::prefix('admin')->namespace('Admin')->group(function () {
        Route::get('/', 'HomeController@index');  // 后台首页

    });
});


