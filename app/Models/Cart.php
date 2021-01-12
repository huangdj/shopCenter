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
        $num = 0;
        foreach ($carts as $v) {
            $total_price += $v->product->price * $v->num;
            $num += $v->num;
        }

        $count['total_price'] = number_format($total_price,2,".","");
        $count['num'] = $num;

        return $count;
    }
}
