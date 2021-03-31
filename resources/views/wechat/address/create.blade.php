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
    <title>新增地址</title>
    <link type="text/css" rel="stylesheet" href="/vendor/wechat/css/style.css"/>
    <link rel="stylesheet" href="/vendor/wechat/css/common.css">
    <link rel="stylesheet" type="text/css" href="/vendor/mobiscroll/css/mobiscroll.scroller.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/mobiscroll/css/mobiscroll.frame.css"/>
    <link rel="stylesheet" href="/vendor/wechat/toast/css/toast.css">
    <link rel="stylesheet" href="/vendor/wechat/toast/css/showMessage.css">
    <link rel="stylesheet" href="/vendor/wechat/toast/css/animate.css">
</head>

<body>
<div class="headerbox">
    <div class="header">
        <div class="headerC">
        </div>
        <div class="headerR">
            <a href="javascript:;" class="save-button">完成</a>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="kbox"></div>
<div class="addressDiv">
    <div class="addiv1">
        <div class="addiv1_l">收货人：</div>
        <div class="addiv1_r"><input name="name" placeholder="真实姓名" type="text"/></div>
    </div>
    <div class="addiv1">
        <div class="addiv1_l">手机号：</div>
        <div class="addiv1_r"><input placeholder="手机号" name="tel" type="text"/></div>
    </div>
    <div class="addiv1">
        <div class="addiv1_l">省市区：</div>
        <div class="addiv1_r">
            <input placeholder="省 市 区" name="pca" id="area" maxlength="20" type="text"
                   readonly="readonly" value="">
        </div>
    </div>
    <div class="addiv1">
        <div class="addiv1_l">详细地址：</div>
        <div class="addiv1_r"><input name="detail" placeholder="街道门牌号" type="text"/></div>
    </div>
</div>

<script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/mobiscroll/js/mobiscroll.core.js"></script>
<script type="text/javascript" src="/vendor/mobiscroll/js/mobiscroll.frame.js"></script>
<script type="text/javascript" src="/vendor/mobiscroll/js/mobiscroll.scroller.js"></script>
<script type="text/javascript" src="/vendor/mobiscroll/js/mobiscroll.select.js"></script>
<script type="text/javascript" src="/vendor/mobiscroll/js/i18n/mobiscroll.i18n.zh.js"></script>
<script type="text/javascript" src="/vendor/wechat/js/areas.js"></script>
<script type="text/javascript" src="/vendor/wechat/js/areas_config.js"></script>
<script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
<script type="text/javascript" src="/vendor/wechat/toast/js/toast.js"></script>
<script type="text/javascript">
    $(function () {
        $('.save-button').click(function () {
            var status = true;

            $("input").each(function () {
                var val = $(this).val();
                if (val == "") {
                    status = false;
                }
            });

            if (status == false) {
                showMessage('您填写的地址不完整!', 2000, true, 'bounceIn-hastrans', 'bounceOut-hastrans')
                return false;
            }

            var data = $("input").serialize();

            $.ajax({
                type: "POST",
                url: "/address",
                data: data,
                success: function () {
                    location.href = document.referrer;
                }
            })
        })
    })
</script>
</body>
</html>
