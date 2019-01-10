<?php
require_once '../include.php';
checkuer();
$uid=$_SESSION['loginFlag'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>编辑用户</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<link type="text/css" rel="stylesheet" media="all" href="styles/jquery.jqzoom.css"/>

<script src="scripts/jquery-1.6.js" type="text/javascript"></script>
<script src="scripts/jquery.jqzoom-core.js" type="text/javascript"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->


</head>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="京东网"></a>
			</div>
		<h3 class="welcome_title">修改您的信息</h3>
		</div>
	</div>
</div>


	<div class="regBox">
	<div class="login_cont">
	<form method="post" enctype="multipart/form-data" action="doUserAction.php?act=reg" >
		<ul class="login">
			<li><span class="reg_item"><i>*</i>新用户名：</span><div class="input_item"><input type="text"  name="username"  placeholder="请输入用户名" class="login_input user_icon" required="required"></div></li>
			<li><span class="reg_item"><i>*</i>新密码：</span><div class="input_item"><input type="password"  name="password" placeholder="请输入您要设置的密码"  class="login_input user_icon"required="required"></div></li>
			<li><span class="reg_item"><i>*</i>新手机号：</span><div class="input_item"><input type="text" name="phone" placeholder="请输入电话号码" class="login_input user_icon"required="required"></div></li>
			<li><span class="reg_item"><i>*</i>性别：</span><div class="input_item">
			<input type="radio"  name="sex" value="1"> 男
			<input type="radio"  checked="checked" name="sex" value="2" > 女
			<input type="radio"  name="sex" value="3" > 保密
			</div></li>
			<li class="autoLogin"><span class="reg_item">&nbsp;</span><input type="checkbox" id="t1" class="checked"><label for="t1">我同意所有交易条款</label></li>
			<li><span class="reg_item">&nbsp;</span><button style="border:none;width:266px;height:35px;outline:none;"><img src="images/reg.jpg" alt="" /></button></li>
		</ul>
		</form>
	</div>
</div>

		<div class="login_partners">
			<p class="l_tit">使用合作方账号登陆网站</p>
			<ul class="login_list clearfix">
				<li><a href="#">QQ</a></li>
				<li><span>|</span></li>
				<li><a href="#">网易</a></li>
				<li><span>|</span></li>
				<li><a href="#">新浪微博</a></li>
				<li><span>|</span></li>
				<li><a href="#">腾讯微薄</a></li>
				<li><span>|</span></li>
				<li><a href="#">新浪微博</a></li>
				<li><span>|</span></li>
				<li><a href="#">腾讯微薄</a></li>
			</ul>
		</div>

	<a class="reg_link" href="#"></a>


<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">京东简介</a><i>|</i><a href="#">京东公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 京东版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>