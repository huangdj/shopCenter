<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title>优惠券详情</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <style type="text/css">
        .quannews_2 .d1 p {
            text-align: center;
            font-size: 0.8rem;
            color: #fff;
        }
    </style>
</head>

<body>
<div class="quannewsbox1">
    <div class="quannews_2">
        <div class="d1"><p>{{ $coupon->name }}</p></div>
        <div class="d2">
            <div class="d21"><img src="/vendor/wechat/images/q13.png"/></div>
            <div class="d22">使用期限 {{ $coupon->not_before->format('Y.m.d') }}-{{ $coupon->not_after->format('Y.m.d') }}</div>
            <div class="d21"><img src="/vendor/wechat/images/q13.png"/></div>
            <div class="clear"></div>
        </div>
        <div class="d3">￥{{ number_format($coupon->value, 2) }}</div>
        <div class="d4"><img src="/vendor/wechat/images/q12.png"/></div>
    </div>
</div>
<div class="clear"></div>
<div class="quannewsbox2">
    <div class="quannews_3">
        <p>共1份</p>
    </div>
    <div class="kbox"></div>
    <div class="quannews_4">
        <p class="p1">面额详情</p>
        <p class="p2">{{ number_format($coupon->value, 2) }}元</p>
        <p class="p1">使用说明</p>
        <p class="p3">"{{ $coupon->name }}"使用须知：<br/>{{ $coupon->description }}</p>
    </div>
</div>
</body>
</html>
