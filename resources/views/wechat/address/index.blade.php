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
    <title>收货地址</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
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
            <a onclick="location.href='/order/checkout'" class="goback"><img
                    src="/vendor/wechat/images/goback.png"/></a>
        </div>
        <div class="headerC">
            <p>管理收货地址</p>
        </div>
        <div class="headerR">
            <a href="/address/create">添加</a>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="addressbox on">
    @if($default_address)
        <div class="addressbox_1" onclick="location.href='/order/checkout'">
            <p class="p1">收货人：{{$default_address->name}}<span>{{$default_address->tel}}</span></p>
            <p class="p2">{{$default_address->province}} {{$default_address->city}} {{$default_address->area}} {{$default_address->detail}} </p>
        </div>
        <div class="addressbox_2">
            <div class="ad1">
                <div class="ad1_1">
                    <div class="gwccheck on"></div>
                </div>
                <div class="ad1_2">默认地址</div>
            </div>
        </div>
    @else
        <div class="b13" style="padding: 5px 0 5px 0;">
            <p style="text-align: center">
                <span style="color:#FF5722;">暂无默认地址~</span>
            </p>
        </div>
    @endif
</div>
<div class="w100" style="margin-top: 5px;">
    <img src="/vendor/wechat/images/addressline.png"/>
</div>
<div class="kbox"></div>

@foreach($addresses as $address)
    <div class="addressbox">
        <div class="addressbox_1">
            <p class="p1">收货人：{{$address->name}}<span>{{$address->tel}}</span></p>
            <p class="p2">{{$address->province}} {{$address->city}} {{$address->area}} {{$address->detail}}</p>
        </div>
        <div class="addressbox_2">
            <div class="ad1">
                <div class="ad1_1">
                    <div class="gwccheck default_address" data-id="{{$address->id}}"></div>
                </div>
                <div class="ad1_2 default_address" data-id="{{$address->id}}">设为默认</div>
            </div>
            <div class="ad2">
                <a href="javascript:;" class="del_one" data-id="{{$address->id}}">
                    <div class="ad2_1"><img src="/vendor/wechat/images/del.png"/></div>
                    <div class="ad2_2">删除</div>
                </a>
            </div>
            <div class="ad2 mr">
                <a href="/address/{{$address->id}}/edit">
                    <div class="ad2_1"><img src="/vendor/wechat/images/edit.png"/></div>
                    <div class="ad2_2">编辑</div>
                </a>
            </div>
        </div>
    </div>
@endforeach
<div class="clear"></div>
<div class="kbox"></div>

<script type="text/javascript">
    $(function () {
        $('.default_address').click(function () {
            var address_id = $(this).data("id");
            $.ajax({
                type: "PATCH",
                url: "/address",
                data: {address_id: address_id},
                success: function () {
                    window.location.reload();
                }
            })
        })

        $('.del_one').click(function () {
            var id = $(this).data("id");
            $.ajax({
                type: "DELETE",
                url: "/address/" + id,
                success: function () {
                    window.location.reload();
                }
            })
        })
    })
</script>
</body>
</html>
