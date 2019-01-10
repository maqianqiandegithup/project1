<?php
require_once '../include.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
   <div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="index.php" class="collection">京东首页</a>
				<a href="orderItem.php" target="_blank" class="collection" style="margin-left:6px">我的订单</a>
			
				 <a href="carDetail.php">购物车<span style="color:red">
				<?php if($_SESSION['loginFlag']){
				$sql="select * from shop_car where uid=".$_SESSION['loginFlag'];
				$carnum=getResultNum($sql);
				echo $carnum;}
				else echo 0;?>
				</span></a>
			</div>
			<div class="rightArea">
				欢迎来到京东女装网
				<?php if($_SESSION['loginFlag']):?>
				<span>欢迎您</span><span style="color:red"><?php echo $_SESSION['username'];?></span>
				<a href="doUserAction.php?act=userOut">[退出]</a>
				<?php else:?>
				<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
				<?php endif;?>
		</div>
	</div>
</div>
<div class="headerBar">
	<div class="logoBar red_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="京东网"></a>
			</div>
			<h3 class="welcome_title">欢迎注册</h3>
		</div>
	</div>
</div>
<div class="loginBox">
	<div class="login_cont">
	<form method="post" action="doUserAction.php?act=login" >
		<ul class="login">
			<li class="l_tit">邮箱/用户名/手机号</li>
			<li class="mb_10"><input type="text"  name="username" placeholder="请输入用户名" class="login_input user_icon"></li>
			<li class="l_tit">密码</li>
			<li class="mb_10"><input type="password" name="password" class="login_input user_icon"></li>
			<li class="autoLogin"><input type="checkbox" id="a1" class="checked"><label for="a1">自动登陆</label></li>
			<li><input type="submit" value="" class="login_btn"></li>
		</ul>
		</form>
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
	</div>
	<a class="reg_link" href="#"></a>
</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">慕课简介</a><i>|</i><a href="#">慕课公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 慕课版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>