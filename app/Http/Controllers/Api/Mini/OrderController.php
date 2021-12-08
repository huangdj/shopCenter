<?php /** @noinspection ALL */

namespace App\Http\Controllers\Api\Mini;

use App\Http\Controllers\Controller;
use App\Jobs\CloseOrder;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /***
     * 结算
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory
     */
    public function checkout()
    {
        $carts = Cart::with('product')->where('user_id', auth('users')->user()->id)->get();
        $count = Cart::count_carts($carts);

        //如果购物车中没有商品,跳回购物车页面
        if ($carts->isEmpty()) {
            return ['status' => false];
        }
        $address = Address::find(auth('users')->user()->address_id);
        return response()->json(compact('carts', 'count', 'address'));
    }

    /***
     * 下单
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $carts = Cart::with('product')->where('user_id', auth('users')->user()->id)->get();

        //防止用户使用微信的后退按钮，重新提交订单，导致出现没有数据的订单
        if ($carts->isEmpty()) {
            return ['status' => false, 'message' => ''];
        }

        $count = Cart::count_cart();
        $total_price = $count['total_price'];

        DB::beginTransaction();
        try {
            //生成订单
            $order = Order::create([
                'user_id' => auth('users')->user()->id,
                'total_price' => $total_price,
                'out_trade_no' => Order::make_orderNo(),
                'message' => $request->message,
                'status' => 1,
                'pay_type' => 1
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

            $carts = Cart::with('product')->where('user_id', auth('users')->user()->id)->get();
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

            //清空购物车
            Cart::where('user_id', auth('users')->user()->id)->delete();

        } catch (\Exception $e) {
            DB::rollback();
            return ['status' => false, 'info' => $e->getMessage()];
        }
        DB::commit();
        $this->dispatch(new CloseOrder($order, config('app.order_ttl')));
        return ['status' => true, 'order_id' => $order->id];
    }
}
