<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\GetCoupon;
use App\Models\Order;
use App\Models\Point;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function __construct()
    {
        view()->share(['_customer' => 'on']);
    }

    // 我的
    public function index()
    {
        $customer = Customer::find(session('wechat.customer.id'));
        $count_collections = Collection::where('customer_id', session('wechat.customer.id'))->count();
        $order_num = Order::where('customer_id', session('wechat.customer.id'))->count();
        $total_points = Point::where('customer_id', session('wechat.customer.id'))->sum('scores');
        // 未使用且未过期的优惠券数量
        $coupon_num = GetCoupon::where('customer_id', session('wechat.customer.id'))->where('status', true)->where('expired', true)->count();
        return view('wechat.customer.index', compact('customer', 'count_collections', 'order_num', 'total_points', 'coupon_num'));
    }

    /***
     * 购物车收藏
     * @param Request $request
     */
    public function add_collection(Request $request)
    {
        $product_id = $request->product_id;
        $product = Collection::where('customer_id', session('wechat.customer.id'))->where('product_id', $product_id)->first();
        // 如果已经收藏了
        if ($product) {
            Collection::where('customer_id', session('wechat.customer.id'))->where('product_id', $product_id)->delete();
            return;
        }
        Collection::create([
            'product_id' => $product_id,
            'customer_id' => session('wechat.customer.id')
        ]);
    }

    // 我的收藏
    public function collection()
    {
        $collections = Collection::where('customer_id', session('wechat.customer.id'))->with('product')->orderBy('created_at', 'desc')->get();
        return view('wechat.customer.collection', compact('collections'));
    }

    /***
     * 积分列表
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function points()
    {
        $total_points = Point::where('customer_id', session('wechat.customer.id'))->sum('scores');
        $points = Point::with('order')->where('customer_id', session('wechat.customer.id'))->orderBy('created_at', 'desc')->get();
        return view('wechat.customer.points', compact('total_points', 'points'));
    }

    /***
     * 已领取并未使用且未过期的优惠券
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coupons()
    {
        view()->share(['_status' => 'on']);
        $coupons = GetCoupon::with('coupon')->where('customer_id', session('wechat.customer.id'))->where('status', 1)->where('expired', 1)->orderBy('created_at', 'desc')->get();
        return view('wechat.customer.coupon', compact('coupons'));
    }


    /***
     * 已使用且未过期的优惠券
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function used_coupons()
    {
        view()->share(['_status_2' => 'on']);
        $coupons = GetCoupon::with('coupon')->where('customer_id', session('wechat.customer.id'))->where('status', 2)->where('expired', 1)->orderBy('created_at', 'desc')->get();
        return view('wechat.customer.used_coupons', compact('coupons'));
    }

    /***
     * 已过期的优惠券
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function expired_coupons()
    {
        view()->share(['_status_3' => 'on']);
        $coupons = GetCoupon::with('coupon')->where('customer_id', session('wechat.customer.id'))->whereDate('expired_at', '<', date('Y-m-d', time()))->orderBy('created_at', 'desc')->get();
        foreach ($coupons as $k => $v) {
            GetCoupon::where('id', $v->id)->update(['status' => 3, 'expired' => 0]);
        }
        return view('wechat.customer.expired_coupons', compact('coupons'));
    }

    /***
     * 查看优惠券详情
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_coupon($id)
    {
        $coupon = Coupon::with('get_coupon')->find($id);
        return view('wechat.customer.show_coupon', compact('coupon'));
    }
}
