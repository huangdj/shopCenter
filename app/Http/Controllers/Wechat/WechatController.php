<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $app = app('wechat.official_account');
        $app->server->push(function ($message) {
            return '<a href="https://www.holyzq.com">欢迎关注 停洞亿家人购物中心！点我去商城逛逛吧~</a>';
        });

        return $app->server->serve();
    }
}
