<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title></title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery-1.8.1.min.js"></script>
</head>

<body>
<div class="headerbox">
    <div class="header">
        <div class="headerC">
            <p>收银台</p>
        </div>
        <div class="headerR"></div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="kbox"></div>
<div class="paybox">
    <div class="pay3">
        <div class="pay3_L">
            <img src="/vendor/wechat/images/pay3.png"/><span>订单提交成功~</span>
        </div>
        <div class="pay3_C" style="color: #D92E2E"></div>
    </div>
    <div class="pay3">
        <div class="pay3_L">
            <span style="color: #FF5722">请在30分钟内完成支付，超时订单将自动关闭。</span>
        </div>
    </div>
    <div class="pay3 wx">
        <div class="pay3_L">
            <img src="/vendor/wechat/images/pay6.png"/><span>微信支付</span>
        </div>
        <div class="pay3_R">
            <div class="gwccheck on"></div>
        </div>
        <div class="tuijian">
            <img src="/vendor/wechat/images/jian.png"/>
        </div>
    </div>
</div>
<div class="fbox2"></div>
<div class="hejiBox jiesuan">
    <div class="heji">
        <div class="heji_3"><p>支付金额：<span>￥{{ number_format($order->total_price, 2) }}</span></p></div>
        <div class="heji_5">
            <a href="javascript:;" id="payment">付款</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = function () {
        countDown();

        function addZero(i) {
            return i < 10 ? "0" + i : i + "";
        }

        function countDown() {
            var nowtime = new Date();
            var endtime = new Date({!! json_encode($order->created_at) !!});
            // endtime.setSeconds(endtime.getSeconds() + 30); // 设置30秒
            endtime.setMinutes(endtime.getMinutes() + 30); // 设置30分钟
            var lefttime = parseInt((endtime.getTime() - nowtime.getTime()) / 1000);
            var m = parseInt(lefttime / 60 % 60);
            var s = parseInt(lefttime % 60);
            m = addZero(m);
            s = addZero(s);
            document.querySelector(".pay3_C").innerHTML = `剩余支付时间：${m} 分 ${s} 秒`;
            if (lefttime <= 0) {
                document.querySelector(".pay3_C").innerHTML = "订单已失效";
                return;
            }
            setTimeout(countDown, 1000);
        }
    }
</script>
</body>
</html>
