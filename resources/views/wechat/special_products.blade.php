<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title>今日特价</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".tolist img").click(function () {
                $(".likebox").toggle();
                $(".shoplist").toggle();
            })
        })
    </script>
</head>

<body>
<div class="tolist"><img src="/vendor/wechat/images/tolist.png"/></div>
<div class="totop"><a href="javascript:scrollTo(0,0)"><img src="/vendor/wechat/images/totop.png"/></a></div>
<div class="kbox"></div>
<div class="likebox">
    <ul>
        @foreach($special_products as $special_product)
            <li>
                <a href="/product/{{ $special_product->id }}">
                    <img src="{{ $special_product->image }}" class="proimg"/>
                    <p class="tit">{{ $special_product->name }}</p>
                    <p class="price">￥{{ $special_product->price }}
                        <span>￥{{ $special_product->original_price }}</span></p>
                </a>
            </li>
        @endforeach
    </ul>
</div>

<div class="shoplist" style="display:none">
    <ul>
        @foreach($special_products as $special_product)
        <li>
            <a href="/product/{{ $special_product->id }}">
                <div class="listL"><img src="{{ $special_product->image }}"/></div>
                <div class="listR">
                    <div class="v1">{{ $special_product->name }}</div>
                    <div class="v2"><span>包邮</span></div>
                    <div class="v3">
                        <p class="p1">￥{{ $special_product->price }}<span>￥{{ $special_product->original_price }}</span></p>
                        <p class="p2">364人付款</p>
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
</body>
</html>
