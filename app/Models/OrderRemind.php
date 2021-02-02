<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderRemind extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
