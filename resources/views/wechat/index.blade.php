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
    <script type="text/javascript" src="/vendor/wechat/js/banner.js"></script>
</head>

<body>
<div class="topssbox1">
    <div class="topss">
        <a href="seacher.html">
            <div class="topssbox">
                <img src="/vendor/wechat/images/s.png"/>
            </div>
        </a>
    </div>
</div>
<div class="banner">
    <div id="fade_focus">
        <div class="loading"></div>
        <ul>
            @foreach($adverts as $advert)
                <li><img src="{{ $advert->image }}"/></li>
            @endforeach
        </ul>
    </div>
</div>
<div class="clear"></div>
<div class="typeNav">
    <ul>
        <li>
            <a href="shoplist.html">
                <img src="/vendor/wechat/images/typeicon1.png"/>
                <p>今日特惠</p>
            </a>
        </li>
        <li>
            <a href="shoplist.html">
                <img src="/vendor/wechat/images/typeicon2.png"/>
                <p>全球购</p>
            </a>
        </li>
        <li>
            <a href="javascript:void()">
                <img src="/vendor/wechat/images/typeicon3.png"/>
                <p>充值中心</p>
            </a>
        </li>
        <li>
            <a href="jifen.html">
                <img src="/vendor/wechat/images/typeicon4.png"/>
                <p>我的积分</p>
            </a>
        </li>
        <li>
            <a href="javascript:void()">
                <img src="/vendor/wechat/images/typeicon5.png"/>
                <p>签到</p>
            </a>
        </li>
        <li>
            <a href="quanNews1.html">
                <img src="/vendor/wechat/images/typeicon6.png"/>
                <p>优惠券</p>
            </a>
        </li>
        <li>
            <a href="shoplist.html">
                <img src="/vendor/wechat/images/typeicon7.png"/>
                <p>闪电购</p>
            </a>
        </li>
        <li>
            <a href="/product/category">
                <img src="/vendor/wechat/images/typeicon8.png"/>
                <p>分类</p>
            </a>
        </li>
    </ul>
</div>
<div class="clear"></div>
<div class="hotTit">
    <div class="hotTitL">
        <img src="/vendor/wechat/images/hotit.png"/>
    </div>
    <div class="hotTitR">
        <p>{{ $notice->title }}</p>
    </div>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="timeBuy">
    <div class="Buybox">
        <p><span>限时</span>抢购</p>
        <a href="shoplist.html" class="more"></a>
        <a href="shoplist.html" class="btn">全场一折起</a>
    </div>
    <ul>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/timebuy1.png"/>
                <p>超值特惠电饭煲</p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/timebuy2.png"/>
                <p>达芙妮秋款包包</p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/timebuy3.png"/>
                <p>特百惠优质水杯</p>
            </a>
        </li>
        <li>
            <a href="xq.html">
                <img src="/vendor/wechat/images/timebuy4.png"/>
                <p>易捷手机充电宝</p>
            </a>
        </li>
    </ul>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="clear"></div>
<div class="w100">
    <img src="{{ $banner->image }}"/>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="clear"></div>
<div class="hotMarket">
    <div class="hotM_1">
        <div class="hotM_1L">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/1.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_1C">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/2.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_1R">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/3.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
    </div>
    <div class="hotM_1">
        <div class="hotM_1L">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/4.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_1C">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/5.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_1R">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/6.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="hotMarket">
    <div class="hotM_2">
        <p><span>品牌</span>特卖</p>
        <i>知名品牌，特价销售</i>
        <a href="shoplist.html" class="more">更多</a>
    </div>
    <div class="hotM_3">
        <div class="hotM_3L">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/7.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_3R">
            <div class="hotM_3R_1">
                <div
                    style="width:100%; height:100%;background-image:url(/vendor/wechat/images/8.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
            </div>
            <div class="hotM_3R_1 br">
                <div
                    style="width:100%; height:100%;background-image:url(/vendor/wechat/images/9.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
            </div>
            <div class="hotM_3R_1">
                <div
                    style="width:100%; height:100%;background-image:url(/vendor/wechat/images/10.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
            </div>
            <div class="hotM_3R_1 br">
                <div
                    style="width:100%; height:100%;background-image:url(/vendor/wechat/images/11.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="hotMarket">
    <div class="hotM_2">
        <p><span>热门</span>主题</p>
        <i>太热门啦，要挤爆了</i>
        <a href="shoplist.html" class="more">更多</a>
    </div>
    <div class="hotM_4">
        <div class="hotM_4L">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/12.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_4R">
            <div class="hotM_4R_1">
                <div
                    style="width:100%; height:100%;background-image:url(/vendor/wechat/images/13.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
            </div>
            <div class="hotM_4R_1 br">
                <div
                    style="width:100%; height:100%;background-image:url(/vendor/wechat/images/14.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
            </div>
            <div class="hotM_4R_1">
                <div
                    style="width:100%; height:100%;background-image:url(/vendor/wechat/images/15.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
            </div>
            <div class="hotM_4R_1 br">
                <div
                    style="width:100%; height:100%;background-image:url(/vendor/wechat/images/16.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
            </div>
        </div>
    </div>
    <div class="hotM_5">
        <div class="hotM_5L">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/17.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_5L">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/18.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_5L">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/19.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
        <div class="hotM_5L br">
            <div
                style="width:100%; height:100%;background-image:url(/vendor/wechat/images/20.png); background-repeat:no-repeat; background-position:center center; background-size:contain"></div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="likebox">
    <div class="likeTit">
        <img src="/vendor/wechat/images/heart.png"/><span>猜你喜欢</span>
    </div>
    <ul>

        @foreach($products as $product)
            <li>
                <a href="/product/{{ $product->id }}">
                    <img src="{{ $product->image }}" class="proimg" style="width: 190px;height: 190px;"/>
                    <p class="tit">{{ $product->name }}</p>
                    <p class="price">￥{{ $product->price }}<span>￥{{ $product->original_price }}</span><img
                            src="/vendor/wechat/images/f3.png"/></p>
                </a>
            </li>
        @endforeach
    </ul>
</div>
<div class="fbox"></div>

@include('layouts.wechat.shared._footer')
</body>
</html>
