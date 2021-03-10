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
    <title>商品详情页</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <link rel="stylesheet" href="/vendor/wechat/flexslider/flexslider.css">
    <link rel="stylesheet" href="/vendor/wechat/toast/css/toast.css">
    <link rel="stylesheet" href="/vendor/wechat/toast/css/showMessage.css">
    <link rel="stylesheet" href="/vendor/wechat/toast/css/animate.css">

    <script type="text/javascript" src="/vendor/wechat/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
    <script type="text/javascript" src="/vendor/wechat/toast//js/toast.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.hdbox_2 ul li').click(function () {
                $('.hdbox_2 ul li').removeClass('on');
                $(this).addClass('on');
            })
        })

        //选项卡
        function setTab(name, cursel, n) {
            for (i = 1; i <= n; i++) {
                var menu = document.getElementById(name + i);
                var con = document.getElementById("con_" + name + "_" + i);
                menu.className = i == cursel ? "hover" : "";
                con.style.display = i == cursel ? "block" : "none";
            }
        }

        // 轮播图
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
</head>

<body>
<div class="hdbox">
    <div class="hdbox0">
        <div class="hdbox_2">
            <ul>
                <li class="on"><a href="#m1">商品</a></li>
                <li><a href="#m2">详情</a></li>
                <li><a href="#m3">评价</a></li>
            </ul>
        </div>
        <div class="hdbox_3">
            <a onclick="javascript:history.back(-1)"><img src="/vendor/wechat/images/h2.png"/></a>
        </div>
    </div>
</div>
<div class="hbox"></div>
<a name="m1">
    <div class="xqbox1">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($product->product_galleries as $product_gallery)
                        <li>
                            <img src="{{$product_gallery->img}}" title="pic"/>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <p class="tit">{{ $product->name }}</p>
        <div class="qita">
            <p class="p1">￥{{ $product->price }}
                @if($product->is_new)
                    <span>新品促销</span>
                @endif
            </p>
            <p class="p2 change_text" style="color: #D92E2E">全国包邮 | 销量{{ $product->sales_volume }}</p>
            <p class="p2" style="color: #D92E2E"></p>
        </div>
    </div>
</a>
<div class="xqbox2" style="color: #08c">
    {{ $product->description }}
</div>
<div class="clear"></div>
<div class="kbox"></div>
<a name="m3">
    <div class="xqpj">
        <div class="xqpjtit">
            <div class="xqbox2L">
                <span>商品评价({{ $total_num }})</span>
            </div>
            <div class="xqbox2R">
                <a href="/product/appraise/{{ $product->id }}"><img src="/vendor/wechat/images/more.png"></a>
            </div>
        </div>

        @if($appraise)
            <div class="xqpjbox">
                <div class="pj1">
                    <img src="{{ $appraise->customer->headimgurl }}"/>
                    <span>{{ $appraise->customer->nickname }}</span>
                </div>
                <div class="pj2">{{ $appraise->content }}</div>
                <img src="{{ $appraise->image }}" style="width: 3rem;height: 3rem;margin-top: 10px;">
                <div class="pj3">{{ $appraise->created_at->format('Y-m-d') }}</div>
            </div>
            <div class="morepj">
                <a href="/product/appraise/{{ $product->id }}">查看更多评价</a>
            </div>
        @else
            <div class="morepj">
                <a href="javascript:;">该商品暂无评价</a>
            </div>
        @endif
    </div>
</a>
<div class="clear"></div>
<div class="kbox"></div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="xgtj">
    <div class="tjtit">相关推荐</div>
    <div class="tjcon">
        <ul>
            @foreach($recommends as $recommend)
                <li>
                    <a href="/product/{{ $recommend->id }}">
                        <img src="{{ $recommend->image }}"/>
                        <div class="tit"><span>￥{{ $recommend->price }}</span></div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="clear"></div>
<a name="m2">
    <div class="kbox"></div>
</a>

<div class="xqtab">
    <div class="Menubox">
        <ul>
            <li class="hover" onclick="setTab('two',1,3)" id="two1">图文详情</li>
            <li class="" onclick="setTab('two',2,3)" id="two2">产品参数</li>
            <li class="" onclick="setTab('two',3,3)" id="two3">热卖推荐</li>
        </ul>
    </div>
    <div class="Contentbox">
        <div id="con_two_1">
            <div class="xqsub">
                {!! $product->markdown_html_code !!}
            </div>
        </div>
        <div style="display:none" id="con_two_2">

            @foreach($product->product_parames as $parame)
                <div class="canshu">
                    <div class="canshu_1">
                        <p class="pl">{{ $parame->parame_name }}</p>
                        <p class="pr">{{ $parame->parame_value }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="display:none" id="con_two_3">
            <div class="likebox bort">
                <ul>

                    @foreach($products as $p)
                        <li>
                            <a href="/product/{{ $p->id }}">
                                <img src="{{ $p->image }}" class="proimg"/>
                                <p class="tit">{{ $p->name }}</p>
                                <p class="price">￥{{ $p->price }}<span>￥{{ $p->original_price }}</span><img
                                        class="add_cart" src="/vendor/wechat/images/f3.png"/></p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="xqbotbox">
    <div class="xqbotbox0">
        <div class="xqbotboxL">
            <ul>
                <li>
                    <a href="tel:13762881395">
                        <img src="/vendor/wechat/images/telephone.png"/>
                        <p>客服</p>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="collection" data-pid="{{ $product->id }}">
                        @if(!$collection)
                            <img src="/vendor/wechat/images/like.png"/>
                        @else
                            <img src="/vendor/wechat/images/heart.png"/>
                        @endif
                        <p>收藏</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="xqbotboxR">
            @if($product->end_at > \Carbon\Carbon::now()->format('Y-m-d'))
                <a class="a2 buy_now">立即购买</a>
                <a class="a1 add_cart">加入购物车</a>
            @else
                <a href="javascript:;" class="a2 end_product"
                   style="color: #999;border: 1px solid;background:none">活动结束</a>
            @endif
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
            var end_at = {!! json_encode($product->end_at) !!}
            var endtime = new Date(end_at.replace(/\-/g, "/"));  // 防止 iOS 手机显示 Nan 问题
            var lefttime = parseInt((endtime.getTime() - nowtime.getTime()) / 1000);
            var d = parseInt(lefttime / (24 * 60 * 60))
            var h = parseInt(lefttime / (60 * 60) % 24);
            var m = parseInt(lefttime / 60 % 60);
            var s = parseInt(lefttime % 60);
            d = addZero(d)
            h = addZero(h);
            m = addZero(m);
            s = addZero(s);
            document.querySelector(".p2").innerHTML = `抢购倒计时：${d}天 ${h} 时 ${m} 分 ${s} 秒`;
            if (lefttime <= 0) {
                document.querySelector(".p2").innerHTML = "活动已结束";
                return;
            }
            setTimeout(countDown, 1000);
        }
    }

    $(function () {
        // 加入购物车
        $('.add_cart').click(function () {
            $.ajax({
                type: 'POST',
                url: '/cart',
                data: {product_id: "{{ $product->id }}"},
                success: function (data) {
                    if (data.status = true) {
                        showMessage(data.message, 2000, true, 'bounceIn-hastrans', 'bounceOut-hastrans')
                    }
                }
            })
        })

        // 立即购买
        $('.buy_now').click(function () {
            $.ajax({
                type: 'POST',
                url: '/cart',
                data: {product_id: "{{ $product->id }}"},
                success: function () {
                    location.href = '/cart';
                }
            })
        })

        // 收藏，传商品 id
        $('.collection').click(function () {
            var product_id = $(this).data('pid');
            $.ajax({
                type: 'POST',
                url: '/customer/add_collection',
                data: {product_id: product_id},
                success: function () {
                    location.href = location.href
                }
            })
        })

        $('.end_product').click(function () {
            showMessage('活动已结束，请下次再来', 2000, true, 'bounceIn-hastrans', 'bounceOut-hastrans')
        })
    })
</script>
</body>
</html>
