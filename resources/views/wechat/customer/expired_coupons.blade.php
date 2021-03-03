<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title>我的优惠券</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
</head>

<body>
<div class="quannewsbox">
    <ul>
        <li class="{{ $_status ?? '' }}">
            <a href="/customer/coupons">已领取</a>
        </li>
        <li class="{{ $_status_2 ?? '' }}">
            <a href="/customer/used_coupons">已使用</a>
        </li>
        <li class="{{ $_status_3 ?? '' }}">
            <a href="/customer/expired_coupons">已过期</a>
        </li>
    </ul>
</div>

<div class="quannewsbox1" @if ($coupons->isEmpty()) style="display: none;" @endif>
    @foreach($coupons as $coupon)
        <div class="quannews_1">
            <div class="quanbg"><img src="/vendor/wechat/images/q6.png"/></div>
            <div class="quanb bg">
                <div class="quanL">
                    <p class="p1">{{ $coupon->coupon->name }}</p>
                    <p class="p2">{{ $coupon->coupon->not_before->format('Y年m月d日') }}至{{ $coupon->coupon->not_after->format('Y年m月d日') }}</p>
                </div>
                <div class="quanR">
                    <p class="p3">￥{{ $coupon->coupon->value }}元</p>
                    <a href="/customer/coupon/{{ $coupon->coupon->id }}" class="a3">查看详情</a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="quanbg"><img src="/vendor/wechat/images/q8.png"/></div>
            <div class="quanstate"><img src="/vendor/wechat/images/q9.png"/></div>
            @if($coupon->status == 2)
                <div class="quanstate2"><img src="/vendor/wechat/images/q10.png"/></div>
            @else
                <div class="quanstate2"><img src="/vendor/wechat/images/weishiyong_1.png"/></div>
            @endif
        </div>
    @endforeach
</div>
<div class="quannewsbox1" @if (!$coupons->isEmpty()) style="display: none;" @endif>
    <div class="quannews_2 bg">
        <div class="d1"><p></p></div>
        <div class="d2">
            <div class="d21"><img src="/vendor/wechat/images/q13.png"/></div>
            <div class="d22" style="color: #08c">暂无优惠券，请持续关注~</div>
            <div class="d21"><img src="/vendor/wechat/images/q13.png"/></div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>
