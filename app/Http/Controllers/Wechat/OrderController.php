<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Appraise;
use App\Models\OrderRemind;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderAddress;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function __construct()
    {
        view()->share(['_status' => 'on']);
    }

    /***
     * 所有订单
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            $query->where('customer_id', session('wechat.customer.id'));

            switch ($request->status) {
                case '':
                    break;
                case '1':
                    $query->where('status', 1);
                    break;
                case '2':
                    view()->share(['_status_2' => 'on', '_status' => '']);
                    $query->where('status', 2);
                    break;
                case '4':
                    view()->share(['_status_4' => 'on', '_status' => '', '_status_2' => '']);
                    $query->whereIn('status', [3, 4]);
                    break;
                case '5':
                    view()->share(['_status_5' => 'on', '_status' => '', '_status_2' => '', '_status_4' => '']);
                    $query->where('status', 5);
                    break;
            }
        };
        $order_status = config('admin.order_status');
        $orders = Order::where($where)->with('order_products.product', 'customer', 'express')->orderBy('created_at', 'desc')->get();
        return view('wechat.order.index', compact('order_status', 'orders'));
    }

    /***
     * 结算
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory
     */
    public function checkout()
    {
        $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();
        $count = Cart::count_cart($carts);

        //如果购物车中没有商品,跳回购物车页面
        if ($carts->isEmpty()) {
            return redirect('/cart');
        }
        $address = Address::find(session('wechat.customer.address_id'));

        return view('wechat.order.checkout', compact('carts', 'count', 'address'));
    }

    /***
     * 订单提醒
     * @param Request $request
     */
    public function remind(Request $request)
    {
        $info = OrderRemind::where('order_id', $request->id)->first();
        if ($info) {
            return response()->json(['status' => false, 'message' => '您已提醒过了，请耐心等待商家处理']);
        }
        OrderRemind::create(['order_id' => $request->id]);
        return response()->json(['status' => true, 'message' => '提醒成功']);
    }

    public function show($id)
    {

    }

    /***
     * 待收货
     */
    public function received($id)
    {
        $order = Order::with('express', 'address', 'order_products.product')->find($id);
        return view('wechat.order.received', compact('order'));
    }

    /***
     * 确认收货
     * @param Request $request
     */
    public function finished(Request $request)
    {
        Order::where('id', $request->id)->update(['status' => 5]);
    }

    /***
     * 立即评价
     */
    public function appraise($id)
    {
        $order = Order::with('order_products.product')->find($id);
        return view('wechat.order.appraise', compact('order'));
    }

    /***
     * 提交评价
     * @param Request $request
     */
    public function submit_appraise(Request $request)
    {
        $res = Appraise::where('order_id', $request->order_id)->first();
        if ($res) {
            return response()->json(['success' => false, 'message' => '您已评价过了，请勿重复评价~']);
        }
        Appraise::create($request->all());
    }

    public function appraise_success()
    {
        return view('wechat.order.appraise_success');
    }

    /***
     * 下单
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();

        //防止用户使用微信的后退按钮，重新提交订单，导致出现没有数据的订单
        if ($carts->isEmpty()) {
            return ['status' => 0, 'info' => ''];
        }

        $count = Cart::count_cart();
        $total_price = $count['total_price'];

        DB::beginTransaction();
        try {
            //生成订单
            $order = Order::create([
                'customer_id' => session('wechat.customer.id'),
                'total_price' => $total_price,
                'out_trade_no' => Order::make_orderNo(),
                'message' => $request->message,
                'status' => 1
            ]);

            //订单地址
            $address = Address::find($request->address_id);
            $order->address()->create([
                'province' => $address['province'],
                'city' => $address['city'],
                'area' => $address['area'],
                'detail' => $address['detail'],
                'name' => $address['name'],
                'tel' => $address['tel'],
            ]);

            $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();
            foreach ($carts as $cart) {
                //判断库存是否足够
                if ($cart->product->stock != '-1' and $cart->product->stock - $cart->num < 0) {
                    throw new \Exception('商品' . $cart->product->name . ", 目前仅剩下" . $cart->product->stock . " 件. \n请返回购物车, 修改订单后再下单!");
                }

                //削减库存数量
                if ($cart->product->stock != '-1') {
                    $cart->product->decrement('stock', $cart->num);
                }

                //插入订单商品表
                $order->order_products()->create([
                    'product_id' => $cart->product_id,
                    'num' => $cart->num
                ]);
            }

            //清空购物车
//            Cart::with('product')->where('customer_id', session('wechat.customer.id'))->delete();

        } catch (\Exception $e) {
            //echo $e->getMessage();
            DB::rollback();
            return ['status' => 0, 'info' => $e->getMessage()];
        }
        DB::commit();
        return ['status' => 1, 'order_id' => $order->id];
    }

    /***
     * 订单确认、微信支付
     * @param $id
     */
    public function pay($id)
    {
        /**
         * 第 1 步：查询订单并计算金额
         */
        $order = Order::find($id);
        return view('wechat.order.pay', compact('order'));
    }


}
