<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title>我的收藏</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery-1.8.1.min.js"></script>
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
    </div>
</div>

<div class="clear"></div>
<div class="hbox1" style="height:2.4rem;"></div>
<div class="tolist"><img src="/vendor/wechat/images/tolist.png"/></div>
<div class="totop"><a href="javascript:scrollTo(0,0)"><img src="/vendor/wechat/images/totop.png"/></a></div>
<div class="kbox"></div>
<div class="likebox">
    <ul>

        @foreach($collections as $collection)
            <li>
                <a href="xq.html">
                    <img src="{{ $collection->image }}" class="proimg"/>
                    <p class="tit">{{ $collection->name }}</p>
                    <p class="price">￥{{ $collection->price }}<span>￥{{ $collection->original_price }}</span><img src="/vendor/wechat/images/f3.png"/></p>
                </a>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
