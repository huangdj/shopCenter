<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'name',
        'value',
        'total',
        'used',
        'min_amount',
        'not_before',
        'not_after',
        'enabled',
        'description',
    ];
    protected $casts = [
        'enabled' => 'boolean',
    ];
    // 指明这两个字段是日期类型
    protected $dates = ['not_before', 'not_after'];

    public function getNameAttribute()
    {
        $str = '';

        if ($this->min_amount > 0) {
            $str = '实付满' . str_replace('.00', '', $this->min_amount) . '元';
        }
        return $str . '使用';
    }

    public function get_coupon()
    {
        return $this->hasOne(GetCoupon::class);
    }
}
