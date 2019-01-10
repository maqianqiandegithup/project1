<?php
require_once '../include.php';
checkuer();
$uid=$_SESSION['loginFlag'];


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>我的订单</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">

<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script>


</script>
</head>
<body style="background:#fff">
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="index.php" class="collection">京东首页</a>
				<a href="orderItem.php" target="_blank" class="collection" style="margin-left:6px">我的订单</a>
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
			  
				</span>
				欢迎来到京东商城
				<?php if($uid):?>
				<span>欢迎您</span><span style="color:red"><?php echo $_SESSION['username'];?></span>
				<a href="doUserAction.php?act=userOut">[退出]</a>
				<?php else:?>
				<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWidth">
			<div class="logo fl">
			   <img src="images/logo.jpg" alt="京东商城">
			</div>
			<div class="search_box fl">
				<input type="text" class="search_text">
				<input type="button" value="搜 索" class="search_btn fr">
			</div>
			<div class="shopCar fr">
				<a class="shopText fl" href="carDetail.php">购物车</a>
				<span class="shopNum fl">
				<?php if($uid){
				$sql="select * from shop_car where uid=".$_SESSION['loginFlag'];
				$carnum=getResultNum($sql);
				echo $carnum;}
				else echo 0;?>
				</span>
			</div>
		</div>
	</div>
	
</div>

<div class="orderList comWidth" >
  
    <ul class="orderhead fl">
				<li><a href="orderItem.php" style="margin-right: 25px" >全部订单</a></li>
				<?php
                    $orderBy="order by create_time DESC";
                     
                    
                    $sql="select order_id,uid,pid,bnum,pcolor,psize,payment,post_fee,statue,create_time from jd_order where uid=".$_SESSION['loginFlag']." and statue='未付款' {$orderBy};";
                    $num=getResultNum($sql)
                    ;?>
				<li><a href="orderTable.php?type=未付款" target="mainFrame">待付款订单</a><span ><?php echo $num;?></span></li>
				<?php $sql="select order_id,uid,pid,bnum,pcolor,psize,payment,post_fee,statue,create_time from jd_order where uid=".$_SESSION['loginFlag']." and statue='待发货' {$orderBy};";
                        $num=getResultNum($sql)
                        ;?>
				<li><a href="orderTable.php?type=待发货"target="mainFrame">待发货订单</a><span><?php echo $num;?></span></li>
				<?php $sql="select order_id,uid,pid,bnum,pcolor,psize,payment,post_fee,statue,create_time from jd_order where uid=".$_SESSION['loginFlag']." and statue='待收货' {$orderBy};";
                            $num=getResultNum($sql)
                            ;?>
				<li><a href="orderTable.php?type=待收货"target="mainFrame">待收货订单</a><span><?php echo $num?></span></li>
				<?php $sql="select order_id,uid,pid,bnum,pcolor,psize,payment,post_fee,statue,create_time from jd_order where uid=".$_SESSION['loginFlag']." and statue='待评价' {$orderBy};";
				$num=getResultNum($sql);?>
                
				<li><a href="orderTable.php?type=待评价"target="mainFrame">待评价订单</a><span><?php echo $num;?></span></li>
				
				
			</ul>
	<!-- 嵌套网页开始 -->         
          <iframe src="orderTable.php"  frameborder="0" name="mainFrame" width="100%" height="1000"></iframe>
                <!-- 嵌套网页结束 -->  
        
</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">京东简介</a><i>|</i><a href="#">京东公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 京东版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>

<script type="text/javascript">
    
    </script>
</body>
</html>
