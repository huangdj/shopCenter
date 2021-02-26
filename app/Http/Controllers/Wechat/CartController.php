<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponRecord;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    function __construct()
    {
        view()->share(['_cart' => 'on']);
    }

    /***
     * 购物车首页
     */
    public function index()
    {
        $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->orderBy('id', 'desc')->get();
        $count = Cart::count_cart($carts);

        if (session()->exists('wechat.customer.coupon_id')) {
            session()->forget('wechat.customer');
        }

        // 空购物车推荐商品
        $products = Product::where('is_onsale', true)->where('is_recommend', true)->get();
        return view('wechat.cart.index', compact('carts', 'count', 'products'));
    }

    /***
     * 加入购物车
     * @param Request $request
     */
    public function store(Request $request)
    {
        //判断购物车是否有当前商品,如果有,那么 num +1
        $product_id = $request->product_id;
        $cart = Cart::where('product_id', $product_id)->where('customer_id', session('wechat.customer.id'))->first();

        if ($cart) {
            Cart::where('id', $cart->id)->increment('num');
            return;
        }

        //否则购物车表,创建新数据
        Cart::create([
            'product_id' => $request->product_id,
            'customer_id' => session('wechat.customer.id'),
        ]);
    }

    /***
     * 改变数量
     * @param Request $request
     * @return array
     */
    public function change_num(Request $request)
    {
        if ($request->type == 'add') {
            Cart::where('id', $request->id)->increment('num');
        } else {
            Cart::where('id', $request->id)->decrement('num');
        }
        return Cart::count_cart();
    }

    /***
     * 删除
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
        Cart::destroy($request->id);
        return Cart::count_cart();
    }

    /***
     * 是否选择了优惠券
     */
    public function is_coupon(Request $request)
    {
        $coupon = Coupon::where('id', $request->coupon_id)->first();
        $customer = session()->get('wechat.customer');
        $customer['coupon_id'] = $coupon->id;
        session()->put('wechat.customer', $customer);


//        $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();
//        $total = Cart::count_cart($carts);
//        if ($total['total_price'] < $coupon->min_amount) {
//            return response()->json(['status' => false, 'message' => '下单金额不能低于优惠券金额']);
//        }

//        $data = CouponRecord::where('coupon_id', $coupon->id)->where('customer_id', session('wechat.customer.id'))->first();
//        if ($data) {
//            return response()->json(['status' => false, 'message' => '该优惠券只能使用一次']);
//        }
//        // 存入数据到优惠券记录表
//        CouponRecord::create([
//            'customer_id' => session('wechat.customer.id'),
//            'coupon_id' => $coupon->id
//        ]);

//        $count = [];
//        // 计算最终付款金额，返回给前端
//        $count['total_price'] = number_format($total['total_price'] - $coupon->value, 2);
//
//        // 优惠了多少钱
//        $count['preferential_price'] = $total['preferential_price'] + $coupon->value;
//        return response()->json(compact('coupon', 'count'));
    }

}
