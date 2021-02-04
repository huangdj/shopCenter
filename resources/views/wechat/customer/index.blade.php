<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title>我的</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
</head>

<body>
<div class="m0myheader">
    <div class="conbox">
        <div class="conboxL">
            <img src="{{ $customer->headimgurl }}" class="tt"/>
            <div class="btR">
                <p class="p1">{{ $customer->nickname }}</p>
                <div class="v1">
                    <img src="/vendor/wechat/images/mmm.png"/>
                    <p>我的亲情账号 ></p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="conbox2">
        <ul>
            <li>
                <a href="/customer/collection">
                    <p class="p1">{{$count_collections}}</p>
                    <p class="p2">收藏夹</p>
                </a>
            </li>
            <li>
                <a href="javascript:void()">
                    <p class="p1">1</p>
                    <p class="p2">关注商品</p>
                </a>
            </li>
            <li>
                <a href="javascript:void()">
                    <p class="p1">3</p>
                    <p class="p2">浏览记录</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="clear"></div>
<div class="mypart1">
    <ul>
        <li>
            <a href="jifen.html">
                <p class="p1">{{ $customer->points }}</p>
                <p class="p2">我的积分</p>
            </a>
        </li>
        <li>
            <a href="quanNews1.html">
                <p class="p1">0</p>
                <p class="p2">优惠券</p>
            </a>
        </li>
        <li>
            <a href="/order">
                <p class="p1">{{ $order_num }}</p>
                <p class="p2">订单数量</p>
            </a>
        </li>
        <li>
            <a href="/order">
                <img src="/vendor/wechat/images/my01.png"/>
                <p class="p2">消费记录</p>
            </a>
        </li>
    </ul>
</div>
<div class="kbox"></div>
<div class="kbox"></div>
<div class="clear"></div>
<div class="mypart2">
    <div class="con">
        <div class="pa2_tit">
            <p>我的订单</p>
            <a href="/order">查看更多订单 ></a>
        </div>
        <ul>
            <li>
                <a href="/order?status=1">
                    <div class="ddimg">
                        <img src="/vendor/wechat/images/my02.png"/>
                        @if(\App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 1)->count() > 0)
                            <div
                                class="num">{{ \App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 1)->count() }}</div>
                        @endif
                    </div>
                    <p>待付款</p>
                </a>
            </li>
            <li>
                <a href="/order?status=2">
                    <div class="ddimg">
                        <img src="/vendor/wechat/images/my03.png"/>
                        @if(\App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 2)->count() > 0)
                            <div
                                class="num">{{ \App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 2)->count() }}</div>
                        @endif
                    </div>
                    <p>待发货</p>
                </a>
            </li>
            <li>
                <a href="/order?status=4">
                    <div class="ddimg">
                        <img src="/vendor/wechat/images/my04.png"/>
                        @if(\App\Models\Order::where('customer_id', session('wechat.customer.id'))->whereIn('status', [3,4])->count() > 0)
                            <div
                                class="num">{{ \App\Models\Order::where('customer_id', session('wechat.customer.id'))->whereIn('status', [3,4])->count() }}</div>
                        @endif
                    </div>
                    <p>待收货</p>
                </a>
            </li>
            <li>
                <a href="/order?status=5">
                    <div class="ddimg">
                        <img src="/vendor/wechat/images/my05.png"/>
                        @if(\App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 5)->count() > 0)
                            <div
                                class="num">{{ \App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 5)->count() }}</div>
                        @endif
                    </div>
                    <p>待评价</p>
                </a>
            </li>
            <li>
                <a href="tel:13419566683">
                    <div class="ddimg">
                        <img src="/vendor/wechat/images/my06.png"/>
                    </div>
                    <p>退款/售后</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="kbox"></div>
<div class="clear"></div>
<div class="mypart3">
    <ul>
        <li>
            <a href="javascript:;">
                <img src="/vendor/wechat/images/my7.png"/>
                <p>我的优惠券</p>
            </a>
        </li>
        <li>
            <a href="/address">
                <img src="/vendor/wechat/images/my8.png"/>
                <p>收获地址</p>
            </a>
        </li>
        <li>
            <a href="jifen.html">
                <img src="/vendor/wechat/images/my9.png"/>
                <p>我的积分</p>
            </a>
        </li>
        <li>
            <a href="tel:13419566683">
                <img src="/vendor/wechat/images/my10.png"/>
                <p>我的客服</p>
            </a>
        </li>
    </ul>
</div>
<div class="clear"></div>
@include('layouts.wechat.shared._footer')
</body>
</html>
