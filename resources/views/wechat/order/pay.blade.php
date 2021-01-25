<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
<meta name="renderer" content="webkit"/>
<meta name="force-rendering" content="webkit"/>
<script>/*@cc_on window.location.href="http://support.dmeng.net/upgrade-your-browser.html?referrer="+encodeURIComponent(window.location.href); @*/</script>
<title></title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('.gwccheck').click(function(){
	   if($(this).attr("class")=="gwccheck on"){
	        $(this).removeClass('on');
		}else{
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
      <a onclick="javascript:history.back(-1)" class="goback"><img src="images/goback.png" /></a>
    </div>
    <div class="headerC">
      <p>收银台</p>
    </div>
    <div class="headerR"></div>
  </div>
</div>
<div class="clear"></div>
<div class="hbox"></div>
<div class="kbox"></div>
<div class="paybox">
  <div class="pay3">
    <div class="pay3_L">
      <img src="images/pay3.png" /><span>余额</span>
    </div>
    <div class="pay3_R">
      <div class="gwccheck"></div>
    </div>
    <div class="pay3_C">可用金额0.00元</div>
  </div>
  <div class="pay3">
    <div class="pay3_L">
      <img src="images/pay4.png" /><span>快捷支付</span>
    </div>
    <div class="pay3_R">
      <div class="gwccheck"></div>
    </div>
  </div>
  <div class="pay3">
    <div class="pay3_L">
      <img src="images/pay5.png" /><span>银联支付</span>
    </div>
    <div class="pay3_R">
      <div class="gwccheck"></div>
    </div>
  </div>
  <div class="pay3 wx">
    <div class="pay3_L">
      <img src="images/pay6.png" /><span>微信支付</span>
    </div>
    <div class="pay3_R">
      <div class="gwccheck on"></div>
    </div>
    <div class="tuijian">
      <img src="images/jian.png" />
    </div>
  </div>
</div>
<div class="fbox2"></div>
<div class="hejiBox jiesuan">
  <div class="heji">
    <div class="heji_3"><p>支付：<span>￥784.80</span></p></div>
    <div class="heji_5">
      <a href="paySuccess.html">付款</a>
    </div>
  </div>
</div>
</body>
</html>
