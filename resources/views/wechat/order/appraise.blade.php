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
    <title>评价晒单</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
</head>

<body>
<div class="headerbox">
    <div class="header">
        <div class="headerL">
            <a onclick="javascript:history.back(-1)" class="goback"><img src="/vendor/wechat/images/goback.png"/></a>
        </div>
        <div class="headerC">
            <p>评价晒单</p>
        </div>
        <div class="headerR"></div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>

@foreach($order->order_products as $item)
    <div class="pingjiabox1">
        <div class="pjleft"><img src="{{ $item->product->image }}"/></div>
        <div class="pjright">
            <p class="p1">{{ sub($item->product->name,25) }}</p>
            {{--            <p class="p2">颜色：白色；尺码：均码；</p>--}}
            <p class="p3">￥{{ doubleval($item->product->price) }}</p>
        </div>
    </div>
@endforeach

<div class="clear"></div>
<div class="pingjiabox2">
    <div class="pjbox2_l">描述相符</div>
    <div class="pjbox2_r"><img src="/vendor/wechat/images/star.png"/></div>
    <div class="clear"></div>
    <div class="yijian">
        <textarea id="content" placeholder="请输入您的评价"></textarea>
    </div>
    <div class="picture">
        <input type="file" id="image_upload" style="display: none">
        <img src="/vendor/wechat/images/picad.png" class="upload_image"/>
        <input type="hidden" id="image">
        <img src="/vendor/wechat/images/pic.png" id="img_show">
    </div>
</div>
<div class="clear"></div>
<div class="kbox"></div>
<div class="hejiBox jiesuan">
    <div class="heji">
        <div class="fabiao">
            <a href="javascript:;">确认发表</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
<script type="text/javascript" src="/vendor/html5-fileupload/jquery.html5-fileupload.js"></script>
<script type="text/javascript" src="/js/upload.js"></script>
<script type="text/javascript">
    $(function () {
        $('.upload_image').click(function () {
            $("#image_upload").click()
        })

        $('.fabiao').click(function () {
            var info = {
                content: $("#content").val(),
                image: $("#img_show")[0].src,
                order_id: "{{ $order->id }}"
            }
            if (info.content == "") {
                alert("请填写评价内容~")
                return false
            }

            $.ajax({
                type: 'POST',
                url: "/order/submit_appraise",
                data: info,
                success: function (data) {
                    if (data.success == false) {
                        alert(data.message)
                    } else {
                        location.href = '/order/appraise_success'
                    }
                }
            })

        })
    })
</script>
</body>
</html>
