<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function order_products()
    {
        return $this->hasMany('App\Models\OrderProduct');
    }

    public function address()
    {
        return $this->hasOne('App\Models\OrderAddress');
    }

    /***
     * 生成订单号
     * @return bool|string
     * @throws \Exception
     */
    public static function make_orderNo()
    {
        // 订单流水号前缀
        $prefix = date('YmdHis');
        for ($i = 0; $i < 10; $i++) {
            // 随机生成 6 位的数字
            $no = $prefix . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            // 判断是否已经存在
            if (!static::query()->where('out_trade_no', $no)->exists()) {
                return $no;
            }
        }
        return false;
    }
}
