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
    <title>确认订单</title>
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
@if($address)
    <div class="jsaddress">
        <a href="/address">
            <div class="jsaddressL">
                <p class="p6" id="address" data-id="{{ $address->id }}">收货人：{{$address->name}}
                    <span>{{$address->tel}}</span></p>
                <p class="p5">{{$address->province}} {{$address->city}} {{$address->area}} {{$address->detail}} </p>
            </div>
            <div class="jsaddressR">
                <img src="/vendor/wechat/images/more.png"/>
            </div>
            <div class="clear"></div>
        </a>
    </div>
@else
    <div class="b13" style="padding: 5px 0 5px 0;">
        <p style="text-align: center" id="address" data-id="">
            <a href="/address"><span style="color:#FF5722;">亲, 请先填写一个收货地址~</span></a>
        </p>
    </div>
@endif

<div class="w100">
    <img src="/vendor/wechat/images/addressline.png"/>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="jsdingdan">

    @foreach($carts as $cart)
        <div class="jsxq">
            <div class="jsxq_1">
                <img src="{{ $cart->product->image }}"/>
            </div>
            <div class="jsxq_2">
                <div class="js_1">
                    <p class="p1">{{ $cart->product->name }}</p>
                    <p class="p2">￥{{ $cart->product->price }}</p>
                </div>
                <div class="js_2">
                    <p class="p3">颜色：白色；尺码：L</p>
                    <p class="p4">×{{ $cart->num }}</p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="jsyf">
        <div class="jsyfL">快递运费：</div>
        <div class="jsyfR">全国包邮</div>
    </div>
    <div class="jsyf">
        <div class="jsyfL">买家留言：</div>
        <div class="addiv1_r"><input id="message" type="text" style="width:90%;border: none;outline:none;"></div>
    </div>
    <div class="jshj">
        <div class="jshjp">共{{$count['num']}}件商品<span class="sp1">合计：</span><span
                class="sp2">￥{{$count['total_price']}}</span></div>
    </div>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="jsyhq">
    <div class="jsyhq_1">
        <p class="p1">优惠券</p>
        <p class="p2">无可用</p>
    </div>
    <div class="jsyhq_2">
        <div class="jsjfL">
            <p>积分抵用<span>共150积分，可抵1.5元</span></p>
        </div>
        <div class="jsjfR">
            <div class="gwccheck"></div>
        </div>
    </div>
    <div class="jsyhq_2">
        <div class="jsjfL">
            <p>货到付款：<span>先送货，后付款</span></p>
        </div>
        <div class="jsjfR">
            <div class="gwccheck after_pay"></div>
        </div>
    </div>
</div>
<div class="fbox2"></div>
<div class="hejiBox jiesuan">
    <div class="heji">
        <div class="heji_3"><p>总计：<span>￥{{$count['total_price']}}</span></p></div>
        <div class="heji_5">
            <a href="javascript:;" id="pay">确认</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#pay").click(function () {
            // 判断下单金额
            $.get("/order/get_money", function (data) {
                var total_money = data.money
                var total_price = "{{$count['total_price']}}"
                if (total_price < total_money) {
                    alert("您的购物金额需满" + total_money + "元，才能下单")
                    return false
                }

                var address_id = $("#address").data('id');
                var message = $("#message").val()
                if (address_id == '') {
                    alert('请先填写一个送货地址~');
                    return false;
                }

                // 是否选中货到付款
                var element = document.querySelector(".after_pay")
                var str = element.getAttribute("class").indexOf('on') != -1
                if (str == true) {
                    $.ajax({
                        type: 'POST',
                        url: '/order',
                        data: {address_id: address_id, message: message, pay_type: 2},
                        dataType: 'json',
                        success: function (data) {
                            if (data.status == '0') {

                                if (data.info != '') {
                                    alert(data.info);
                                }

                                location.href = '/cart';
                                return false;
                            }

                            //直接跳转到支付成功页面
                            location.href = '/order/pay_success';
                        }
                    })
                    return false
                }

                $.ajax({
                    type: 'POST',
                    url: '/order',
                    data: {address_id: address_id, message: message, pay_type: 1},
                    dataType: 'json',
                    success: function (data) {
                        if (data.status == '0') {

                            if (data.info != '') {
                                alert(data.info);
                            }

                            location.href = '/cart';
                            return false;
                        }

                        //微信支付
                        location.href = '/order/pay/' + data.order_id;
                    }
                })
            })
        })
    })
</script>
</body>
</html>
