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
/***
 * 后台路由
 */
Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::resource('photos', 'PhotoController')->only('store');  // 上传图片

    Route::namespace('Admin')->middleware('auth')->name('admin.')->group(function () {
        Route::get('/', 'HomeController@index')->name('home'); // 后台首页
        Route::get('change_password', 'HomeController@change_password')->name('change_password');  //加载修改密码页面
        Route::put('update_password', 'HomeController@update_password')->name('update_password');  //执行修改密码

        // 统计
        Route::get('today_orders', 'HomeController@today_orders')->name('today_orders'); // 今日订单详情
        Route::get('month_orders', 'HomeController@month_orders')->name('month_orders'); // 本月订单详情
        Route::get('year_orders', 'HomeController@year_orders')->name('year_orders'); // 全部订单详情

        Route::resource('brands', 'BrandController'); // 品牌管理
        Route::resource('categories', 'CategoryController'); // 商品分类
        Route::resource('themes', 'ThemeController'); // 主题管理
        Route::prefix('products')->group(function () {
            Route::delete('destroy_checked', 'ProductController@destroy_checked')->name('products.destroy_checked');
            Route::patch('change_stock', 'ProductController@change_stock')->name('products.change_stock'); // 改变库存
            Route::patch('change_full_num', 'ProductController@change_full_num')->name('products.change_full_num'); // 改变满额
            Route::patch('change_discount', 'ProductController@change_discount')->name('products.change_discount'); // 改变折扣
            Route::patch('is_something', 'ProductController@is_something')->name('products.is_something'); // 是否...
        });
        Route::resource('products', 'ProductController'); // 商品管理
        Route::resource('adverts', 'AdvertController'); // 广告管理
        Route::resource('notices', 'NoticeController'); // 通知管理
        Route::prefix('express')->group(function () {
            Route::patch('is_something', 'ExpressController@is_something'); // 是否可用
        });
        Route::resource('express', 'ExpressController'); // 物流管理

        Route::prefix('appraises')->group(function () {
            Route::patch('is_something', 'AppraiseController@is_something')->name('appraises.is_something');
        });
        Route::resource('appraises', 'AppraiseController')->only('index', 'destroy'); // 评价管理
        Route::prefix('orders')->group(function () {
            Route::get('reminds', 'OrderController@reminds');  // 订单提醒
            Route::patch('picking', 'OrderController@picking'); // 配货
            Route::patch('shipping', 'OrderController@shipping');  // 修改发货信息
            Route::patch('finish', 'OrderController@finish');  // 交易成功
        });
        Route::resource('orders', 'OrderController'); // 订单管理

        Route::resource('customers', 'CustomerController')->only('index'); // 会员管理

        Route::get('setting', 'ConfigController@setting')->name('config.setting');
        Route::put('setting_update', 'ConfigController@setting_update')->name('config.setting_update');

        Route::resource('coupons', 'CouponController'); // 优惠券管理
    });
});

/***
 * 前台路由
 */
Route::namespace('Wechat')->middleware(['wechat.oauth', 'wechat'])->group(function () {
    Route::get('/', 'HomeController@index'); // 前台首页
    Route::post('get_products', 'HomeController@get_products'); // 加载更多
    Route::get('search', 'HomeController@search'); // 首页搜索
    Route::delete('del_search', 'HomeController@del_search'); // 删除搜索记录
    Route::get('special_products', 'HomeController@special_products'); // 今日特价

    Route::prefix('product')->group(function () {
        Route::get('category', 'ProductController@category'); //商品分类
        Route::get('/', 'ProductController@index'); //商品列表
        Route::get('seckill', 'ProductController@seckill'); //秒杀商品列表
        Route::get('appraise/{id}', 'ProductController@appraise'); //评价列表
        Route::get('{id}', 'ProductController@show'); //商品详情
    });

    //购物车
    Route::prefix('cart')->group(function () {
        Route::post('/', 'CartController@store');
        Route::get('/', 'CartController@index');
        Route::delete('/', 'CartController@destroy');
        Route::patch('/', 'CartController@change_num');
        Route::patch('is_coupon', 'CartController@is_coupon'); // 是否选择优惠或者积分
    });

    // 我的
    Route::prefix('customer')->group(function () {
        Route::get('/', 'CustomerController@index');
        Route::get('collection', 'CustomerController@collection');
        Route::post('add_collection', 'CustomerController@add_collection');
        Route::get('points', 'CustomerController@points');
        Route::get('coupons', 'CustomerController@coupons'); // 已领取且未过期
        Route::get('used_coupons', 'CustomerController@used_coupons'); // 已使用且未过期
        Route::get('expired_coupons', 'CustomerController@expired_coupons'); // 已过期
        Route::get('coupon/{id}', 'CustomerController@show_coupon'); // 优惠券详情
    });

    // 订单
    Route::prefix('order')->group(function () {
        Route::get('checkout', 'OrderController@checkout'); // 去结算
        Route::post('/', 'OrderController@store'); // 下单
        Route::get('/', 'OrderController@index'); // 所有订单
        Route::post('remind', 'OrderController@remind'); // 订单提醒
        Route::patch('finished', 'OrderController@finished'); // 确认收货
        Route::post('submit_appraise', 'OrderController@submit_appraise'); // 提交评价
        Route::get('appraise_success', 'OrderController@appraise_success'); // 加载评价成功页面
        Route::get('get_money', 'OrderController@get_money'); // 获取最低下单金额
        Route::get('pay_success', 'OrderController@pay_success'); // 支付成功页面

        Route::get('pay/{id}', 'OrderController@pay');
        Route::get('{id}', 'OrderController@show');  //
        Route::get('received/{id}', 'OrderController@received');  // 待收货
        Route::get('appraise/{id}', 'OrderController@appraise'); // 加载评价页面

    });

    //地址管理
    Route::prefix('address')->group(function () {
        //设置默认地址
        Route::patch('/', 'AddressController@default_address');
    });
    Route::resource('address', 'AddressController');

    // 优惠券
    Route::resource('coupons', 'CouponController')->only('index', 'store');
});


