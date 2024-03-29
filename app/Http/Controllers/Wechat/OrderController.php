<?php /** @noinspection ALL */

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Appraise;
use App\Models\Config;
use App\Models\Coupon;
use App\Models\GetCoupon;
use App\Models\OrderAddress;
use App\Models\OrderProduct;
use App\Models\OrderRemind;
use App\Models\Point;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Jobs\CloseOrder;

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

        // 获取用户所有未使用的优惠券
        $coupons = GetCoupon::with('coupon')->where('customer_id', session('wechat.customer.id'))->where('status', true)->where('expired', 1)->get();
        return view('wechat.order.checkout', compact('carts', 'count', 'address', 'coupons'));
    }

    /***
     * 获取最低下单金额
     */
    public function get_money()
    {
        $money = Config::select('money')->find(1);
        return $money;
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
        $order = Order::find($request->id);
        $order->update(['status' => 5, 'finish_time' => Carbon::now()]);
    }

    /***
     * 加载评价页面
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
        $res = Appraise::where('order_id', $request->order_id)->where('customer_id', session('wechat.customer.id'))->first();
        if ($res) {
            return response()->json(['success' => false, 'message' => '您已评价过了，请勿重复评价~']);
        }

        $count = count($request->check_id);
        for ($i = 0; $i < $count; $i++) {
            $array[] = ['product_id' => $request->check_id[$i]['value']];
        }
        foreach ($array as $v) {
            Appraise::create([
                'order_id' => $request->order_id,
                'customer_id' => session('wechat.customer.id'),
                'content' => $request->input('content'),
                'image' => $request->image,
                'product_id' => $v['product_id'],
            ]);
        }

        // 评价成功后，修改订单状态
        Order::where('id', $request->order_id)->update(['status' => 6]);
    }

    /***
     * 加载评价成功页面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
                'status' => 1,
                'pay_type' => $request->pay_type
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
                if ($cart->product->stock != '-1' and $cart->product->stock - $cart->num <= 0) {
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

                // 增加商品销量
                Product::where('id', $cart->product->id)->increment('sales_volume', $cart->num);
            }

            // 积分存入积分表
            $order->point()->create([
                'customer_id' => session('wechat.customer.id'),
                'scores' => intval($total_price)
            ]);

            // 如果使用了优惠券，则修改优惠券状态
            if ($request->coupon_id) {
                $data = Coupon::where('id', $request->coupon_id)->first();
                if ($total_price < $data->min_amount) {
                    throw new \Exception('下单金额不能低于优惠券金额');
                }
                $coupon = GetCoupon::where('customer_id', session('wechat.customer.id'))->where('coupon_id', $request->coupon_id)->first();
                $coupon->update(['status' => 2]);

                // 增加优惠券的使用数
                $data->increment('used');
            }

            //清空购物车
            Cart::where('customer_id', session('wechat.customer.id'))->delete();

        } catch (\Exception $e) {
            DB::rollback();
            return ['status' => 0, 'info' => $e->getMessage()];
        }
        DB::commit();
        $this->dispatch(new CloseOrder($order, config('app.order_ttl')));
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


    /***
     * 货到付款下单成功页面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pay_success()
    {
        return view('wechat.order.pay_success');
    }
}
