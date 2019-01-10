<?php
require_once '../include.php';

$uid=$_SESSION['loginFlag'];
$order_id=$_REQUEST['order_id'];
//$proInfo=getCarByUid($uid);

//print_r($rows);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>购物车列表</title>
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
				<span>欢迎您</span><span style="color:red"><?php echo $_SESSION['username'];?>
				</span>
				<a href="doUserAction.php?act=userOut">[退出]</a>
				<?php else:?>
				<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
				<?php endif;?>
		</div>
	</div>
</div>
<div class="carBar">
		<div class="comWidth">
			<div class="logo fl">
				<img src="images/icon/payment.jpg" alt="京东女装网">
			</div>
			<div class="search_box fr">
				<input type="text" class="search_text fl">
				<input type="button" value="搜 索" class="search_btn fr">
			</div>
			
		</div>
	</div>
</div>
 <div class="payarea comwidth">订单提交成功，请尽快支付，|订单号<?php echo $order_id;?>请您在24小时内完成支付，负责订单会自己取消

   <div class="shopping_item">
		<h3 class="shopping_tit">支付方式</h3>
		<div class="shopping_cont padding_shop">
			<ul class="shopping_list">
				<li><input type="radio" class="radio" id="r1"><label for="r1">微信支付</label></li>
			</ul>
		</div>
	</div>
	  <div class="pay">
	  <form action="doUserAction.php?act=payment&order_id=<?php echo $order_id?>" method="post"  enctype="multipart/form-data">
	     <p>请输入微信支付密码</p>
	     <input type="password" class="payPassword" required/>
       	<div class="cart_btnBox">
				<input type="submit" class="cart_btn" value="立即支付" "/>
		</div>
		</form>
	</div>
 </div>
</body>
</html>