<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GetCoupon extends Model
{
    protected $guarded = [];

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
    }
}
