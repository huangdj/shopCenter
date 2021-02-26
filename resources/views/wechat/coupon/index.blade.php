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
    <title>优惠券列表</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <style>
        .a2{
            color: #ccc;
            background: #ccc;
        }
    </style>
</head>

<body>
@if($coupons)
    <div class="quannewsbox1">
        @foreach($coupons as $coupon)
            <div class="quannews_1" data-id="{{ $coupon->id }}">
                <div class="quanbg"><img src="/vendor/wechat/images/q1.png"/></div>
                <div class="quanb">
                    <div class="quanL">
                        <p class="p1">{{ $coupon->name }}</p>
                        <p class="p2">{{ $coupon->not_before->format('Y年m月d日') }}至{{ $coupon->not_after->format('Y年m月d日') }}</p>
                    </div>
                    <div class="quanR">
                        <p class="p3">￥{{ $coupon->value }}元</p>
                        @if($coupon->recived == $coupon->total)
                            <a href="javascript:;" class="a2 receive_code">已被抢光</a>
                        @else
                            <a href="javascript:;" class="a1 receive_code">立即领取</a>
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="quanbg"><img src="/vendor/wechat/images/q3.png"/></div>
                <div class="quanstate"><img src="/vendor/wechat/images/q5.png"/></div>
            </div>
        @endforeach
    </div>
    <div class="clear"></div>
    <div class="quannewsbox2">
        <div class="kbox"></div>
        <div class="quannews_4">
            <p class="p1">领取说明：</p>
            <p class="p3">{{ $receive }}</p>
        </div>
    </div>
@else
    <div class="quannewsbox1">
        <div class="quannews_2 bg">
            <div class="d1"><p>本商城暂未发放优惠券</p></div>
            <div class="d2">
                <div class="d21"><img src="/vendor/wechat/images/q13.png"/></div>
                <div class="d22" style="color: #08c">暂无优惠活动，请持续关注~</div>
                <div class="d21"><img src="/vendor/wechat/images/q13.png"/></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@endif
@include('layouts.wechat.shared._footer')

<script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
<script type="text/javascript">
    $(function () {
        $('.receive_code').click(function () {
            var coupon_id = $(this).parents('.quannews_1').data('id')
            $.ajax({
                type: 'POST',
                url: "/coupons",
                data: {coupon_id: coupon_id},
                success: function (data) {
                    if (data.status = true) {
                        alert(data.message)
                    } else {
                        alert(data.message)
                    }
                }
            })
        })
    })
</script>
</body>
</html>
