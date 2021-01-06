<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/***
 * 后台路由
 */
Route::prefix('admin')->group(function () {
    Auth::routes();
    //上传图片
    Route::resource('photos', 'PhotoController')->only('store');

    Route::namespace('Admin')->middleware('auth')->name('admin.')->group(function () {
        Route::get('/', 'HomeController@index')->name('home'); // 后台首页

        Route::resource('categories', 'CategoryController'); // 商品分类
        Route::resource('products', 'ProductController'); // 商品管理
        Route::resource('adverts', 'AdvertController'); // 广告管理
    });
});


