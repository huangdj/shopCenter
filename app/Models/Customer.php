<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['language', 'privilege'];

    /***
     * 过滤微信昵称图标
     * @param $str
     * @return string|string[]|null
     */
    static public function filterEmoji($str)
    {
        $str = preg_replace_callback('/./u', function (array $match) {
            return strlen($match[0]) >= 4 ? '' : $match[0];
        }, $str);
        return $str;
    }
}
