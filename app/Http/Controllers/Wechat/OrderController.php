<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Address;

class OrderController extends Controller
{
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
}
