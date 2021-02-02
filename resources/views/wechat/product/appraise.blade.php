<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <title>评价列表</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
</head>

<body>
<div class="headerbox">
    <div class="header">
        <div class="headerL">
            <a onclick="javascript:history.back(-1)" class="goback"><img src="/vendor/wechat/images/goback.png"/></a>
        </div>
        <div class="headerC">
            <p>评价列表</p>
        </div>
        <div class="headerR"></div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="xqpj bor">

    @foreach($appraises as $appraise)
        <div class="xqpjbox">
            <div class="pj1">
                <img src="{{ $appraise->customer->headimgurl }}"/>
                <span>{{ $appraise->customer->nickname }}</span>
            </div>
            <div class="pj2">{{ $appraise->content }}</div>
            <img src="{{ $appraise->image }}" style="width: 3rem;height: 3rem;margin-top: 10px;">
            <div class="pj3">{{ $appraise->created_at->format('Y-m-d') }}</div>
        </div>
    @endforeach

</div>
</body>
</html>
