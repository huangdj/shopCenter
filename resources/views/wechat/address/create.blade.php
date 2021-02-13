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
</head>

<body>
<div class="headerbox">
    <div class="header">
        <div class="headerC">
            <p>添加收货地址</p>
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
            <input placeholder="省 市 区" name="pca" id="pca" maxlength="20" type="text"
                   readonly="readonly" value="">
        </div>
    </div>
    <div class="addiv1">
        <div class="addiv1_l">详细地址：</div>
        <div class="addiv1_r"><input name="detail" placeholder="街道门牌号" type="text"/></div>
    </div>
</div>


<div class="ui-mask" style="display:none;"></div>
<div class="ui-pop" style="display:none;">
    <div class="ui-pop-content">
        <div class="region-list" id="city">

        </div>
    </div>
</div>

<div class="popup-risk-check"></div>

<script type="text/javascript" src="/vendor/wechat/js/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/wechat/js/citySelect.js"></script>
<script type="text/javascript" src="/vendor/wechat/js/common.js"></script>
<script>
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
                alert('您填写的地址不完整!')
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
