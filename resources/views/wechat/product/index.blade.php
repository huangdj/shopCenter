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
    <title>商品列表</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".tolist img").click(function () {
                $(".likebox").toggle();
                $(".shoplist").toggle();
            })

            //筛选
            $('.a_sx').click(function () {
                $("#sxtj").animate({right: "0"}, 500);
                $('.f_mask').show();
                $("body").css({'height': '100%', 'overflow': 'hidden'});
                //$("body").css{}
            })

            $('.sx_3 a').click(function () {
                $('.f_mask').hide();
                $('#sxtj').animate({right: "-85%"}, 500);
                $("body").css({'height': 'auto', 'overflow': ''});
            })

            $('.f_mask').click(function () {
                $('.f_mask').hide();
                $('#sxtj').animate({right: "-85%"}, 500);
                $("body").css({'height': 'auto', 'overflow': ''});
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
        <div class="headerC0">
            <a href="seacher.html" style="display:block; width:100%; height:100%"></a>
        </div>
        <div class="headerR">
            <a href="javascript:void()">取消</a>
        </div>
    </div>
</div>
<div class="hbox1"></div>
<div class="tolist"><img src="/vendor/wechat/images/tolist.png"/></div>
<div class="totop"><a href="javascript:scrollTo(0,0)"><img src="/vendor/wechat/images/totop.png"/></a></div>
<div class="kbox"></div>
<div class="likebox">
    <ul>

        @foreach($products as $product)
            <li>
                <a href="/product/{{ $product->id }}">
                    <img src="{{ $product->image }}" class="proimg"/>
                    <p class="tit">{{ $product->name }}</p>
                    <p class="price">￥{{ $product->price }}<span>￥{{ $product->original_price }}</span><img class="add_cart"
                            src="/vendor/wechat/images/f3.png"/></p>
                </a>
            </li>
        @endforeach
    </ul>
</div>
<div class="shoplist" style="display:none">
    <ul>

        @foreach($products as $product)
            <li>
                <a href="/product/{{ $product->id }}">
                    <div class="listL"><img src="{{ $product->image }}"/></div>
                    <div class="listR">
                        <div class="v1">{{ $product->name }}</div>
                        <div class="v2"><span>包邮</span></div>
                        <div class="v3">
                            <p class="p1">￥{{ $product->price }}<span>￥{{ $product->original_price }}</span></p>
                            <p class="p2">364人付款</p>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>

<script type="text/javascript">
    $(function () {
        $('.add_cart').click(function () {
            $.ajax({
                type: 'POST',
                url: '/cart',
                data: {product_id: "{{$product->id}}"},
                success: function () {
                    location.href = '/cart';
                }
            })
        })
    })
</script>
</body>
</html>
