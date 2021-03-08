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
    <title>秒杀列表</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <link rel="stylesheet" href="/vendor/wechat/toast/css/toast.css">
    <link rel="stylesheet" href="/vendor/wechat/toast/css/showMessage.css">
    <link rel="stylesheet" href="/vendor/wechat/toast/css/animate.css">

    <script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
    <script type="text/javascript" src="/vendor/wechat/toast//js/toast.js"></script>
</head>

<body>
<div class="totop"><a href="javascript:scrollTo(0,0)"><img src="/vendor/wechat/images/totop.png"/></a></div>
<div class="kbox"></div>
<div class="likebox">
    <ul>
        @foreach($products as $product)
            <li data-id="{{ $product->id }}">
                <a href="/product/{{ $product->id }}">
                    <img src="{{ $product->image }}" class="proimg"/>
                    <p class="tit">{{ $product->name }}</p>
                    <p class="price">￥{{ $product->price }}<span style="margin-left: -8px;">￥{{ $product->original_price }}</span>
                        @if($product->end_at > \Carbon\Carbon::now()->format('Y-m-d'))
                        <i style="margin-left: 25px;border: 1px solid #ff2150;border-radius: 3px;box-sizing: border-box;font-size: 0.8rem;">立即抢购</i>
                        @else
                            <i style="margin-left: 25px;border: 1px solid #999;border-radius: 3px;box-sizing: border-box;font-size: 0.8rem;color: #999">活动结束</i>
                        @endif
                    </p>
                </a>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
