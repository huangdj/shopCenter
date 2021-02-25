<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Collection;
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
        $coupon_num = GetCoupon::where('customer_id', session('wechat.customer.id'))->count();
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
            return response()->json(['success' => false, 'message' => '您取消了收藏']);
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
     * 会员已领取的优惠券
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coupons(Request $request)
    {
        $where = function ($query) use ($request) {
            $query->where('customer_id', session('wechat.customer.id'));

            switch ($request->status) {
                case '':
                    view()->share(['_status' => 'on']);
                    break;
                case '1':
                    view()->share(['_status' => 'on']);
                    $query->where('status', 1);
                    break;
                case '2':
                    view()->share(['_status_2' => 'on', '_status' => '']);
                    $query->where('status', 2);
                    break;
                case '3':
                    view()->share(['_status_3' => 'on', '_status' => '', '_status_2' => '']);
                    $query->where('status', 3);
                    break;
            }
        };
        $coupons = GetCoupon::with('coupon')->where('customer_id', session('wechat.customer.id'))->where($where)->orderBy('created_at', 'desc')->get();
        return view('wechat.customer.coupon', compact('coupons'));
    }
}
