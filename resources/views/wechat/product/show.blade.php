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
    <script type="text/javascript" src="/vendor/wechat/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="/vendor/wechat/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //选择尺寸
            $('.sizetype').click(function () {
                $("#size").animate({bottom: "0"}, 500);
                $('.f_mask0').show();
                $("body").css({'height': '100%', 'overflow': 'hidden'});
            })
            $('.size3 a').click(function () {
                $('.f_mask0').hide();
                $('#size').animate({bottom: "-80%"}, 500);
                $("body").css({'height': 'auto', 'overflow': ''});
            })

            $('.size1_3 img').click(function () {
                $('.f_mask0').hide();
                $('#size').animate({bottom: "-80%"}, 500);
                $("body").css({'height': 'auto', 'overflow': ''});
            })

            //
            $('.hdbox_2 ul li').click(function () {
                $('.hdbox_2 ul li').removeClass('on');
                $(this).addClass('on');
            })

        })
    </script>
    <script type="text/javascript">
        //选项卡
        function setTab(name, cursel, n) {
            for (i = 1; i <= n; i++) {
                var menu = document.getElementById(name + i);
                var con = document.getElementById("con_" + name + "_" + i);
                menu.className = i == cursel ? "hover" : "";
                con.style.display = i == cursel ? "block" : "none";
            }
        }

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
        <div class="hdbox_1"><a onclick="location.href='/'" class="goback"><img
                    src="/vendor/wechat/images/goback.png"></a>
        </div>
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
            <p class="p2">全国包邮 | 销量{{ $product->sales_volume }}</p>
        </div>
    </div>
</a>
<div class="xqbox2" style="color: #08c">
    {{ $product->description }}
</div>
<div class="clear"></div>
<div class="kbox"></div>
{{--<div class="xqbox2 sizetype">--}}
{{--    <div class="xqbox2L">--}}
{{--        <span>请选择尺码</span>--}}
{{--    </div>--}}
{{--    <div class="xqbox2R">--}}
{{--        <img src="/vendor/wechat/images/more.png">--}}
{{--    </div>--}}
{{--</div>--}}
<div class="clear"></div>
<div class="kbox"></div>
<a name="m3">
    <div class="xqpj">
        <div class="xqpjtit">
            <div class="xqbox2L">
                <span>商品评价({{ $total_num }})</span>
            </div>
            <div class="xqbox2R">
                <img src="/vendor/wechat/images/more.png">
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
                    <a href="xq.html">
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
            <a class="a2 add_cart">立即购买</a> <!--sizetype 代表弹出选择商品 sku 属性框的事件-->
            <a class="a1 add_cart">加入购物车</a>
        </div>
    </div>
</div>
{{--<div class="xzsize">--}}
{{--    <div class="xzsize0">--}}
{{--        <div class="f_mask0"></div>--}}
{{--        <div id="size">--}}
{{--            <div class="size1">--}}
{{--                <div class="size1_1">--}}
{{--                    <img src="/vendor/wechat/images/gwc1.png"/>--}}
{{--                </div>--}}
{{--                <div class="size1_2">--}}
{{--                    <p class="p1">￥489.00</p>--}}
{{--                    <p class="p2">商品编号：2015125412654</p>--}}
{{--                    <p class="p3">库存13540件</p>--}}
{{--                </div>--}}
{{--                <div class="size1_3">--}}
{{--                    <img src="/vendor/wechat/images/close.png"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="size2">--}}
{{--                <div class="size2_1">--}}
{{--                    <p class="tit">颜色</p>--}}
{{--                    <a href="javascript:void()" class="on">白色</a>--}}
{{--                </div>--}}
{{--                <div class="size2_1">--}}
{{--                    <p class="tit">尺码</p>--}}
{{--                    <a href="javascript:void()">X</a>--}}
{{--                    <a href="javascript:void()">L</a>--}}
{{--                    <a href="javascript:void()">XL</a>--}}
{{--                    <a href="javascript:void()">XXL</a>--}}
{{--                    <a href="javascript:void()">量身定做</a>--}}
{{--                </div>--}}
{{--                <div class="size2_1">--}}
{{--                    <p class="tit">数量</p>--}}
{{--                    <div class="lnums">--}}
{{--                        <div class="num1">-</div>--}}
{{--                        <div class="num2">1</div>--}}
{{--                        <div class="num3">+</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="size3">--}}
{{--                <a href="javascript:void()">确定</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<script type="text/javascript">
    $(function () {
        $('.add_cart').click(function () {
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
                success: function (data) {
                    if (data.success == true) {
                        alert(data.message)
                    } else {
                        alert(data.message)
                    }
                    window.location.reload()
                }
            })
        })
    })
</script>
</body>
</html>
