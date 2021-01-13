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
<div class="headerbox">
    <div class="header">
        <div class="headerL">
            <a onclick="javascript:history.back(-1)" class="goback"><img src="/vendor/wechat/images/goback.png"/></a>
        </div>
        <div class="headerC">
            <p>购物车</p>
        </div>
        <div class="headerR"></div>
    </div>
</div>
<div class="clear"></div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="kbox"></div>

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
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/21.png" class="proimg"/>
                <p class="tit">三利 毛巾家纺纯棉吸水 提缎面巾两条装</p>
                <p class="price">￥29.9<span>￥49.9</span><img src="/vendor/wechat/images/f3.png"/></p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/22.png" class="proimg"/>
                <p class="tit">韩国代购正品超爆款 </p>
                <p class="price">￥198.0<span>￥286.0</span><img src="/vendor/wechat/images/f3.png"/></p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/23.png" class="proimg"/>
                <p class="tit">三利 毛巾家纺纯棉吸水 提缎面巾两条装</p>
                <p class="price">￥29.9<span>￥49.9</span><img src="/vendor/wechat/images/f3.png"/></p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/24.png" class="proimg"/>
                <p class="tit">韩国代购正品超爆款 休闲迷彩磨砂真皮运动鞋女单鞋</p>
                <p class="price">￥198.0<span>￥286.0</span><img src="/vendor/wechat/images/f3.png"/></p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/25.png" class="proimg"/>
                <p class="tit">三利 毛巾家纺纯棉吸水 提缎面巾两条装</p>
                <p class="price">￥29.9<span>￥49.9</span><img src="/vendor/wechat/images/f3.png"/></p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/26.png" class="proimg"/>
                <p class="tit">韩国代购正品超爆款 休闲迷彩磨砂真皮运动鞋女单鞋</p>
                <p class="price">￥198.0<span>￥286.0</span><img src="/vendor/wechat/images/f3.png"/></p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/27.png" class="proimg"/>
                <p class="tit">三利 毛巾家纺纯棉吸水 提缎面巾两条装</p>
                <p class="price">￥29.9<span>￥49.9</span><img src="/vendor/wechat/images/f3.png"/></p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/28.png" class="proimg"/>
                <p class="tit">韩国代购正品超爆款 休闲迷彩磨砂真皮运动鞋女单鞋</p>
                <p class="price">￥198.0<span>￥286.0</span><img src="/vendor/wechat/images/f3.png"/></p>
            </a>
        </li>
    </ul>
</div>

<div class="gwcbox" id="carts" @if ($carts->isEmpty()) style="display: none;" @endif>
    <div class="gwcbox_1">
        <div class="gwc1_2">
            @foreach ($carts as $cart)
                <div class="gwcone">
                    {{--                    <div class="go1">--}}
                    {{--                        <div class="gwccheck on"></div>--}}
                    {{--                    </div>--}}
                    <div class="go2"><a href="xq.html"><img src="{{ $cart->product->image }}"/></a></div>
                    <div class="go3 info">
                        <div class="go3_1">
                            <a href="xq.html"><p class="p1">{{ $cart->product->name }}</p></a>
                            <p class="p2">￥{{ $cart->product->price }}</p>
                        </div>
                        <div class="go3_2">
                            {{-- <p class="p3">颜色：白色；尺码：L</p>--}}
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
        <div class="heji_5">
            <a href="/order/checkout" id="num">去结算({{$count['num']}})</a>
        </div>
    </div>
</div>

@include('layouts.wechat.shared._footer')

<script>
    $(function () {
        //删除
        $(".del").click(function () {
            var _this = $(this);
            if (confirm('确定要删除么?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/cart',
                    data: {id: _this.parents(".num").data('id')},
                    success: function (data) {
                        var length = $(".gwcone").length;
                        if (length == 1) {
                            $('#carts').hide();
                            $('#more').show();
                            window.location.reload()
                        }
                        $("#num").text('去结算(' + data.num + ')');
                        $("#total_price").text('￥' + data.total_price);

                        _this.parents('.gwcone').remove();
                    }
                })
            }
        })

        $('.input-add').click(function () {
            var _this = $(this);

            var $num = _this.siblings('.input-num');
            var $sub = _this.siblings('.input-sub');
            var price = _this.parents(".num").data('price');
            var num = $num.text();
            num = parseInt(num) + 1;
            $num.text(num);

            var hj = '￥' + (num * price).toFixed(2);
            _this.parents('.info').find('.hj').text(hj);

            $.ajax({
                type: 'PATCH',
                url: '/cart',
                data: {
                    id: _this.parents(".num").data('id'),
                    type: 'add'
                },
                success: function (data) {
                    console.log(data)
                    $("#num").text('去结算(' + data.num + ')');
                    $("#total_price").text('￥' + data.total_price);
                }
            })
        })

        //减少数量
        $(".input-sub").click(function () {
            var _this = $(this);
            var $num = _this.siblings('.input-num');
            var num = $num.text();
            var price = _this.parents(".num").data('price');

            if (num == 1) {
                return false;
            }

            num = parseInt(num) - 1;
            if (num == 1) {
                _this.removeClass('active');
            }

            $num.text(num);

            var hj = '￥' + (num * price).toFixed(2);
            _this.parents('.info').find('.hj').text(hj);

            $.ajax({
                type: 'PATCH',
                url: '/cart',
                data: {
                    id: _this.parents(".num").data('id'),
                    type: 'sub'
                },
                success: function (data) {
                    console.log(data)
                    $("#num").text('去结算(' + data.num + ')');
                    $("#total_price").text('￥' + data.total_price);
                }
            })
        })
    })
</script>
</body>
</html>
