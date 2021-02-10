<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title>商品分类</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var b = document.body.clientHeight;
            b = b - 45.8;
            $('.shoptypebox').css('height', b);
            $(".shtypeLeft ul li").click(function () {
                $('.shtypeLeft ul li').removeClass('on');
                $(this).addClass('on');
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
            <div class="ssdiv">
                <input name="" type="text"/>
                <a href="/"><img src="/vendor/wechat/images/ss.png"/></a>
            </div>
        </div>
        <div class="headerR">
            <a href="/">取消</a>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="shoptypebox">
    <div class="shtypeLeft">
        <ul>
            @foreach($parent_categories as $cate)
                <li @if($cate->mark == 'm1') class="on" @endif><a href="#{{ $cate->mark }}">{{ $cate->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="shtypeRight">
        <div class="boxOne">
            @foreach($categories as $category)
                <a name="{{ $category->mark }}">
                    <div class="box2 botrtop">
                        <p>{{ $category->name }}</p>
                    </div>
                </a>
                <div class="box3">
                    <ul>
                        @foreach($category->children as $child)
                            <li>
                                <a href="/product?category_id={{$child->id}}">
                                    <img src="{{ $child->image }}"/>
                                    <p>{{ $child->name }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    <div class="clear"></div>
</div>
</body>
</html>
