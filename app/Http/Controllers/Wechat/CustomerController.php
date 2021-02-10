<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Customer;
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
        return view('wechat.customer.index', compact('customer', 'count_collections', 'order_num', 'total_points'));
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
        return response()->json(['success' => true, 'message' => '收藏成功']);
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
}
