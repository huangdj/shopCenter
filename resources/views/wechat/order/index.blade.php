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
    <title>我的订单</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
</head>

<body>
<div class="headerbox">
    <div class="header">
        <div class="headerC">
            <p>我的订单</p>
        </div>
        <div class="headerR"></div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="myddstatu">
    <ul>
        <li class="{{ $_status ?? '' }}">
            <a href="/order">全部({{ \App\Models\Order::where('customer_id', session('wechat.customer.id'))->count() }})</a>
        </li>
        <li class="{{ $_status_2 ?? '' }}">
            <a href="/order?status=2">待发货({{ \App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 2)->count() }})</a>
        </li>
        <li class="{{ $_status_4 ?? '' }}">
            <a href="/order?status=4">待收货({{ \App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 4)->count() }})</a>
        </li>
        <li class="{{ $_status_5 ?? '' }}">
            <a href="/order?status=5">待评价({{ \App\Models\Order::where('customer_id', session('wechat.customer.id'))->where('status', 5)->count() }})</a>
        </li>
    </ul>
</div>
<div class="clear"></div>
<div class="myddcon">

    @foreach($orders as $order)
        <div class="myddcon1">
            <div class="dpbox">
                <div class="dpL">
                    <a href="javascript:;">
                        <span>订单号：{{ $order->out_trade_no }}</span>
                    </a>
                </div>
                @if(in_array($order->status, [3,4]))
                    <div class="dpR"><a href="/order/received/{{ $order->id }}">{{$order_status["$order->status"]}}</a>
                    </div>
                @elseif($order->status == 2)
                    <div class="dpR"><a href="javascript:;">等待卖家发货</a>
                    </div>
                @else
                    <div class="dpR"><a href="javascript:;">{{$order_status["$order->status"]}}</a>
                    </div>
                @endif
            </div>

            @foreach($order->order_products as $order_product)
                <div class="shopbox">
                    <div class="shopboxL">
                        <img src="{{ $order_product->product->image }}"/>
                    </div>
                    <div class="shopboxR">
                        <div class="shopboxR_1">
                            <div class="sbr1_1">{{ $order_product->product->name }}</div>
                            <div class="sbr1_2">
                                <p class="p1">￥{{ $order_product->product->original_price }}</p>
                                <p class="p2">￥{{ $order_product->product->price }}</p>
                            </div>
                        </div>
                        <div class="shopboxR_2">
                            <p class="p4">×{{ $order_product->num }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="dphjbox">
                <p class="p5">下单日期：{{$order->created_at->format('Y/m/d H:i')}}
                    &nbsp;&nbsp;&nbsp;&nbsp;共{{count($order->order_products)}}件商品，合计:<span>￥{{doubleval($order->total_price)}}</span>元</p>
            </div>

            @if($order->status=='1')
                <div class="dpbtn">
                    <div class="dpbtn2">
                        <a href="paySuccess.html">立即付款</a>
                    </div>
                </div>
            @endif

            @if($order->status=='2')
                <div class="dpbtn send_product" data-id="{{ $order->id }}">
                    <div class="dpbtn2">
                        <a href="javascript:;">提醒卖家发货</a>
                    </div>
                </div>
            @endif

            @if(in_array($order->status, [3, 4]))
                <div class="dpbtn">
                    <div class="dpbtn2 finished" data-id="{{ $order->id }}">
                        <a href="javascript:;">确认收货</a>
                    </div>
                    <div class="dpbtn3">
                        <a href="https://m.kuaidi100.com/result.jsp?nu={{ $order->express_code }}&com={{ $order->express->code }}">查看物流</a>
                    </div>
                </div>
            @endif

            @if($order->status=='5')
                <div class="dpbtn">
                    <div class="dpbtn2">
                        <a href="/order/appraise/{{ $order->id }}">立即评价</a>
                    </div>
                    <div class="dpbtn3">
                        <a href="shoplist.html">再次购买</a>
                    </div>
                </div>
            @endif

            @if($order->status=='6')
                <div class="dpbtn">
                    <div class="dpbtn3">
                        <a href="shoplist.html">再次购买</a>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>

<script type="text/javascript">
    $(function () {
        // 提醒发货
        $('.send_product').click(function () {
            var id = $(this).data('id')
            $.ajax({
                type: 'POST',
                url: '/order/remind',
                data: {id: id},
                success: function (data) {
                    if (data.status = true) {
                        alert(data.message)
                    } else {
                        alert(data.message)
                    }
                    window.location.reload()
                }
            })
        })

        // 确认收货
        $('.finished').click(function () {
            var id = $(this).data('id')
            $.ajax({
                type: 'PATCH',
                url: '/order/finished',
                data: {id: id},
                success: function () {
                    window.location.reload()
                }
            })
        })
    })
</script>
</body>
</html>
