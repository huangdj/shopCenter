<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title>积分列表</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
</head>

<body>
<div class="jfheader">
    <div class="guize">积分使用规则</div>
    <div class="jfnum">共 {{ $total_points }}<span>积分</span></div>
    <div class="jfsub">小积分，有大用，多领一些屯起来！</div>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="jfbox">

    @foreach($points as $point)
        <div class="jfbox1">
            <div class="jfbox1_R">
                <div class="jfbox1_R1">
                    <div class="v1">订单号：{{ $point->order->out_trade_no }}</div>
                    <div class="v2">{{ $point->created_at->format('Y-m-d') }}</div>
                </div>
                <div class="jfbox1_R2">
                    <div class="v3">购物送积分</div>
                    <div class="v4">+{{ $point->scores }}</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    @endforeach
</div>
</body>
</html>
