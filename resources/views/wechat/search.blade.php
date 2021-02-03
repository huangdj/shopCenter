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
    <title></title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
</head>

<body style="background:#fff">
<div class="headerbox">
    <div class="header">
        <div class="headerL">
            <a onclick="javascript:history.back(-1)" class="goback"><img src="/vendor/wechat/images/goback.png"/></a>
        </div>
        <div class="headerC0">
            <form action="/product" id="search_form">
                <div class="ssdiv">
                    <input name="keyword" type="text" value="{{ Request::input('keyword') }}"/>
                    <a href="javascript:;" class="submit"><img src="/vendor/wechat/images/ss.png"/></a>
                </div>
            </form>
        </div>
        <div class="headerR">
            <a href="/">取消</a>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="zjssbox">
    <img src="/vendor/wechat/images/s.png" class="i1"/>
    <p class="sstxt">最近搜索</p>
    <img src="/vendor/wechat/images/del.png" class="i2 del_keyword"/>
</div>
<div class="clear"></div>
<div class="ssbox">
    @foreach($least_words as $least_word)
        <a href="javascript:;">{{ $least_word->keyword }}</a>
    @endforeach
</div>
<div class="clear"></div>
<div class="linebox">
    <div class="line0"></div>
</div>
<div class="zjssbox">
    <img src="/vendor/wechat/images/huo.png" class="i1"/>
    <p class="sstxt">热门搜索</p>
</div>
<div class="clear"></div>
<div class="ssbox">
    @foreach($hot_words as $hot_word)
        <a href="javascript:;">{{ $hot_word->keyword }}</a>
    @endforeach
</div>

<script type="text/javascript">
    $(function () {
        $('.submit').click(function () {
            $("#search_form").submit()
        })

        $('.del_keyword').click(function () {
            $.ajax({
                type:'DELETE',
                url:"/del_search"
            })
        })
    })
</script>
</body>
</html>
