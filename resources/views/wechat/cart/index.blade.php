<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>我的购物车</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.gwccheck').click(function () {
                if ($(this).attr("class") == "gwccheck on") {
                    $(this).removeClass('on');
                } else {
                    $(this).addClass('on');
                }
            })
        })
    </script>
</head>

<body>
<div class="paysuccess" id="more" @if (!$carts->isEmpty()) style="display: none;" @endif>
    <div class="pay30">
        <img src="/vendor/wechat/images/gwc.jpg"/>
        <p>购物车还是空的</p>
    </div>
    <div class="pay40">
        <a href="/">去逛逛</a>
    </div>
</div>

<div class="likebox" id="more" @if (!$carts->isEmpty()) style="display: none;" @endif>
    <div class="likeTit">
        <img src="/vendor/wechat/images/heart.png"/><span>猜你喜欢</span>
    </div>
    <ul>

        @foreach($products as $product)
            <li data-pid="{{ $product->id }}">
                <a href="/product/{{ $product->id }}">
                    <img src="{{ $product->image }}" class="proimg"/>
                    <p class="tit">{{ $product->name }}</p>
                    <p class="price">￥{{ $product->price }}<span>￥{{ $product->original_price }}</span><img
                            src="/vendor/wechat/images/f3.png" class="add_cart"/></p>
                </a>
            </li>
        @endforeach
    </ul>
</div>

<div class="gwcbox" id="carts" @if ($carts->isEmpty()) style="display: none;" @endif>
    <div class="gwcbox_1">
        <div class="gwc1_2">
            @foreach ($carts as $cart)
                <div class="gwcone">
                    <div class="go2"><a href="/product/{{ $cart->product->id }}"><img
                                src="{{ $cart->product->image }}"/></a></div>
                    <div class="go3 info">
                        <div class="go3_1">
                            <a href="/product/{{ $cart->product->id }}"><p class="p1">{{ $cart->product->name }}</p></a>
                            <p class="p2">￥{{ $cart->product->price }}</p>
                        </div>
                        <div class="go3_2">
                            @if($cart->product->full_num >0)
                                <p class="p3">数量满{{ $cart->product->full_num }}{{discount_value($cart->product->unit)}}
                                    , 可享受{{$cart->product->discount}}折</p>
                            @elseif($cart->product->is_seckill)
                                <p class="p3" style="color: #ff2150">秒杀商品，尽快下单</p>
                            @else
                                <p class="p3">暂无优惠活动</p>
                            @endif
                            <p class="p4 hj">￥{{number_format($cart->product->price * $cart->num,2,".","")}}</p>
                        </div>
                        <div class="go3_3 num" data-id="{{$cart->id}}" data-price="{{$cart->product->price}}">
                            <div class="num1 input-sub">-</div>
                            <div class="num2 input-num">{{ $cart->num }}</div>
                            <div class="num3 input-add">+</div>
                            <div class="del"><img src="/vendor/wechat/images/del.png"/></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="hejiBox" id="carts" @if ($carts->isEmpty()) style="display: none;" @endif>
    <div class="heji">
        <div class="heji_3 price">
            <p>合计：<span id="total_price">￥{{$count['total_price']}}</span></p>
        </div>
        <div class="heji_4">为您节省￥{{ $count['preferential_price'] }}</div>
        <div class="heji_5">
            <a href="/order/checkout" id="num">去结算({{$count['num']}})</a>
        </div>
    </div>
</div>

@include('layouts.wechat.shared._footer')

<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="/js/cart.js"></script>
</body>
</html>
