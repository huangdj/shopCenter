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

    public function express()
    {
        return $this->belongsTo('App\Models\Express');
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
        for ($i = 0; $i < 4; $i++) {
            $no = $prefix . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 0);
            // 判断是否已经存在
            if (!static::query()->where('out_trade_no', $no)->exists()) {
                return $no;
            }
        }
        return false;
    }
}
