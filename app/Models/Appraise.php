<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appraise extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
