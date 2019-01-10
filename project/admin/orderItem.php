<?php
require_once '../include.php';
$uid=$_REQUEST['uid'];


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>客户订单</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/backstage.css">


<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script>


</script>
</head>
<body style="background:#fff">
<div class="orderList comWidth" >
  
    <ul class="orderhead fl">
				<li style="float:left;" ><a style="height:35px; display:inline-block; padding:0 35px; color:#000;" href="orderItem.php?uid=<?php echo $uid?>" >全部订单</a></li>
				<li style="float:left;"><a style="height:35px; display:inline-block; padding:0 35px; color:#000;" href="orderTable.php?type=未付款&uid=<?php echo $uid?>" target="orderFrame">待付款订单</a></li>
				<li style="float:left;"><a style="height:35px; display:inline-block; padding:0 35px; color:#000;" href="orderTable.php?type=待发货&uid=<?php echo $uid?>"target="orderFrame">待发货订单</a></li>
				<li style="float:left;"><a style="height:35px; display:inline-block; padding:0 35px; color:#000;"   href="orderTable.php?type=待收货&uid=<?php echo $uid?>"target="orderFrame">待收货订单</a></li>
				<li style="float:left;"><a style="height:35px; display:inline-block; padding:0 35px; color:#000;"   href="orderTable.php?type=待评价&uid=<?php echo $uid?>"target="orderFrame">待评价订单</a></li>
				
				
			</ul>
	<!-- 嵌套网页开始 -->         
          <iframe src="orderTable.php?uid=<?php echo $uid?>"  frameborder="0" name="orderFrame" width="100%" height="1000"></iframe>
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
