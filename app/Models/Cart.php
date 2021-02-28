<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * 计算购物车总价和数量
     */
    static function count_cart($carts = null)
    {
        $count = [];

        //避免重复查询数据
        $carts = $carts ? $carts : Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();

        $total_price = 0;
        $preferential_price = 0;
        $num = 0;
        foreach ($carts as $v) {
            // 判断是否是带折扣商品
            if ($v->product->discount > 0 && $v->num >= $v->product->full_num) {
                $total_price += $v->product->price * $v->product->discount * 0.1 * $v->num;
                $preferential_price += $v->product->price * $v->num - $v->product->price * $v->product->discount * 0.1 * $v->num;
            } else {
                $total_price += $v->product->price * $v->num;
            }
            $num += $v->num;
        }

        // 判断是否使用了优惠券，如果使用了，则获取优惠金额进行计算
        $coupon = Coupon::find(session('wechat.customer.coupon_id'));

        if ($coupon) {
            $count['total_price'] = number_format(($total_price - $coupon->value), 2, ".", "");
            // 加上优惠券后节省了多少钱
            $count['preferential_price'] = number_format(($preferential_price + $coupon->value), 2, ".", "");
        } else {
            $count['total_price'] = number_format($total_price, 2, ".", "");
            // 打折后优惠了多少钱
            $count['preferential_price'] = number_format($preferential_price, 2, ".", "");
        }

        $count['num'] = $num;
        return $count;
    }
}
