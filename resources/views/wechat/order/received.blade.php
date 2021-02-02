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
    <title>待收货订单</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <style>
        .hejiBox .heji .heji_6 {
            float: right;
            width: 5rem;
            height: 2.8rem;
            overflow: hidden;
        }
        .hejiBox .heji .heji_6 a {
            display: block;
            background: #999;
            color: #fff;
            text-align: center;
            line-height: 2.8rem;
            width: 5rem;
            height: 2.8rem;
            font-size: 0.875rem;
            pointer-events: none;
        }
    </style>
    <script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
</head>

<body>
<div class="headerbox">
    <div class="header">
        <div class="headerL">
            <a onclick="javascript:history.back(-1)" class="goback"><img src="/vendor/wechat/images/goback.png"/></a>
        </div>
        <div class="headerC">
            <p>待收货订单</p>
        </div>
        <div class="headerR"></div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="dddshbox1">
    <div class="dddshbox1_1">买家已付款</div>
    <div class="dddshbox1_2">快递公司：{{ $order->express->name }}
        &nbsp;&nbsp;&nbsp;&nbsp;快递单号：{{ $order->express_code }}</div>
</div>
<div class="clear"></div>
<div class="ddwl">
    <a href="https://m.kuaidi100.com/result.jsp?nu={{ $order->express_code }}&com={{ $order->express->code }}">
        <div class="ddwl1"><img src="/vendor/wechat/images/car.png"/></div>
        <div class="ddwl2">
            <p class="p1">点击查看物流信息</p>
            <p class="p2">发货时间：{{ $order->shipping_time }}</p>
        </div>
        <div class="ddwl3"><img src="/vendor/wechat/images/mre1.png"/></div>
    </a>
</div>
<div class="clear"></div>
<div class="ddwl">
    <a href="addressGL.html">
        <div class="ddwl1"><img src="/vendor/wechat/images/wz.png"/></div>
        <div class="ddwl5">
            <p class="p1">收货人：{{ $order->address->name }} {{ $order->address->tel }}</p>
            <p class="p2">{{ $order->address->province }}{{ $order->address->city }}{{ $order->address->area }}{{ $order->address->detail }}</p>
        </div>
    </a>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="shnobox">
    <div class="shnobox1">
        <div class="shnobox1_L">
            <a href="javascript:;">
                <span>如需退款，请联系客服</span>
                <img src="/vendor/wechat/images/mre1.png">
            </a>
        </div>
        <div class="shnobox1_R">
            <img src="/vendor/wechat/images/ww.png"/>
            <span><a href="tel:13419566683">联系客服</a></span>
        </div>
    </div>
    @foreach($order->order_products as $order_product)
        <div class="shnobox2">
            <div class="shnobox2_L">
                <img src="{{ $order_product->product->image }}"/>
            </div>
            <div class="shnobox2_R">
                <div class="shnobox2_R_1">
                    <div class="le">{{ $order_product->product->name }}</div>
                    <div class="ri">￥{{ $order_product->product->price }}</div>
                </div>
                <div class="shnobox2_R_2">
                    <div class="lef">
                        <p class="p2">×{{ $order_product->num }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="jsyf">
        <div class="jsyfL">快递运费：</div>
        <div class="jsyfR">￥{{ $order->express_money }}</div>
    </div>
    <div class="jsyf">
        <div class="jsyfL">价格合计：</div>
        <div class="jsyfR red">￥{{ doubleval($order->total_price + $order->express_money) }}</div>
    </div>
    <div class="jsyf">
        <div class="jsyfL">支付方式：</div>
        <div class="jsyfR">微信支付</div>
    </div>
    <div class="shnobox3">
        订单编号：{{ $order->out_trade_no }}<br/>
        付款时间：{{ $order->pay_time }}<br/>
        买家留言：周六日不收货
    </div>
</div>
<div class="clear"></div>
<div class="fbox2"></div>
<div class="hejiBox jiesuan">
    <div class="heji">
        <div class="heji_3"><p>总计：<span>￥{{ doubleval($order->total_price + $order->express_money) }}</span></p></div>
        @if($order->status == '5')
            <div class="heji_6">
                <a href="javascript:;">确认收货</a>
            </div>
        @else
            <div class="heji_5 finished" data-id="{{ $order->id }}">
                <a href="javascript:;">确认收货</a>
            </div>
        @endif
    </div>
</div>

<script type="text/javascript">
    $(function () {
        // 确认收货
        $('.finished').click(function () {
            var id = $(this).data('id')
            $.ajax({
                type: 'PATCH',
                url: '/order/finished',
                data: {id: id},
                success: function () {
                    if (confirm('是否去评价？')) {
                        location.href = '/order/appraise'
                    } else {
                        window.location.reload()
                    }
                }
            })
        })
    })
</script>
</body>
</html>
