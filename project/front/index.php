<?php
require_once '..\include.php';
require_once 'Recommend.inc.php';
$cates=getAllcate();
if(!($cates && is_array($cates))){
    alertMes("不好意思，网站维护中!!!", "http://www.imooc.com");
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<style>

#user .alt:hover{
text-decoration:none;z-index:2;
}
#user .alt #edit{
display:none;
}
#user .alt:hover #edit{
position:absolute;
display:block;
top:40px;right:300px;
border:1px solid #000;
padding:0 1em;
z-index:1;
color:black;
background:#fff;
cursor:pointer;
}

</style>

</head>
<body style="background:#EFEDEE">
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="#" class="collection">京东首页</a>
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
				欢迎来到京东商城
				
				<?php if($_SESSION['loginFlag']):?>
				<span>欢迎您</span><span id="user"> <span class='alt' href="/"><span style="color:red" ><?php echo $_SESSION['username'];?>
				
                                          <span id="edit"  onclick="window.open('edituser.php')">
                                             修改我的信息
                                          </span></span></span></span>
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
				<a href="carDetail.php" class="shopText fl">购物车</a>
				<span class="shopNum fl">
				<?php if($_SESSION['loginFlag']){
				$sql="select * from shop_car where uid=".$_SESSION['loginFlag'];
				$carnum=getResultNum($sql);
				echo $carnum;}
				else echo 0;?>
				</span>
			</div>
		</div>
	</div>
	<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl" onmouseover="show('shopcates','catelists')" onmouseout="vanish('shopcates','catelists')">
				<h3 id="shopcates">全部商品分类<i class="shopClass_icon" ></i></h3>
				<div class="shopClass_show" id="catelists" style="display:none;">
				<?php foreach ($cates as $cate)
				    echo(' <div class="shopClass_item"><a href="#'.$cate['cName'].'"class="b">'.$cate['cName'].'</a></div>'); 
				   ?>
				   <div class="shopClass_item"><a href="#猜你喜欢"class="b" onclick="recommend();">猜你喜欢</a></div>
				</div>
				</div>
			<ul class="nav fl">
				<li><a href="#" class="active">秒杀</a></li>
				<li><a href="#">优惠券</a></li>
				<li><a href="#">plus会员</a></li>
				<li><a href="#">闪购</a></li>
				<li><a href="#">拍卖</a></li>
				<li><a href="#">二手市场</a></li>
				
			</ul>
		</div>
	</div>
</div>
<div class="banner comWidth clearfix">
	<div class="banner_bar banner_big">
		<ul class="imgBox">
			<li><a href="#"><img src="images/banner/banner_01.jpg" alt="banner"></a></li>
			<li><a href="#"><img src="images/banner/banner_02.jpg" alt="banner"></a></li>
		</ul>
		<div class="imgNum">
			<a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
		</div>
	</div>
</div>
<?php foreach($cates as $cate):?>
<div class="shopTit comWidth" id=<?php echo$cate['cName'];?> >
	<h3><?php echo $cate['cName'];?></h3>
	<a href="" class="more">回到顶端&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
	<div class="leftArea">
		<div class="banner_bar banner_sm">
			<ul class="imgBox">
				<li><a href="#">
				<?php echo ('<img src="images/banner/'.$cate['cName'].'.jpg" alt="banner"');?>
				</a></li>
			</ul>
		</div>
	</div>
	<div class="rightArea">
		<div class="shopList_top clearfix">
		<?php 
			$pros=getProsByCid($cate['id']);
			if($pros &&is_array($pros)):
			foreach($pros as $pro):
			$proImg=getProImgById($pro['id']);
		?>
			<div class="shop_item">
				<div class="shop_img">
					<a href="proDetails.php?id=<?php echo $pro['id'];?>" target="_blank"><img  src="../image_220/<?php echo $proImg['albumPath'];?>" alt=""></a>
				</div>
				<h6><?php echo $pro['pName'];?></h6>
				<p>￥<?php echo ($pro['mPrice']*$pro['dicprice']);?></p>
			</div>
			<?php 
			endforeach;
			endif;
			?>
			
		</div>
		
	</div>
</div>
<?php endforeach;?>

<div class="shopTit comWidth" id="猜你喜欢">
	<h3>猜你喜欢</h3>
	<a href="#" class="more">回到顶端&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
	<div class="leftArea">
		<div class="banner_bar banner_sm">
			<ul class="imgBox">
				<li><a href="#">
				<?php echo ('<img src="images/banner/猜你喜欢.jpg" alt="banner"');?>
				</a></li>
			</ul>
		</div>
	</div>
	<div class="rightArea">
		<div class="shopList_top clearfix">
		
		<?php 
		    $recommends=$_SESSION['recommend'];
		    if($recommends):
		    foreach($recommends as $recommend):
		    $pid=(int)(substr($recommend,1));
		    $pro=getProById($pid);
		    if($pro):
			$proImg=getProImgById($pro['id']);
		?>
			<div class="shop_item">
				<div class="shop_img">
					<a href="proDetails.php?id=<?php echo $pro['id'];?>" target="_blank"><img height="220" width="220" src="../image_220/<?php echo $proImg['albumPath'];?>" alt=""></a>
				</div>
				<h6><?php echo $pro['pName'];?></h6>
				<p><?php echo ($pro['mPrice']*$pro['dicprice']);?>元</p>
			</div>
			<?php
			endif;
			endforeach;
			endif;
			//下面的步骤解决冷启动问题
			if(!$recommends):
			$sql="select * from jd_pro where isShow=1 limit 3";
			
			$pros=fetchAll($sql);
			if($pros &&is_array($pros)):
			foreach($pros as $pro):
			$proImg=getProImgById($pro['id']);
			?>
			<div class="shop_item">
				<div class="shop_img">
					<a href="proDetails.php?id=<?php echo $pro['id'];?>" target="_blank"><img  src="../image_220/<?php echo $proImg['albumPath'];?>" alt=""></a>
				</div>
				<h6><?php echo $pro['pName'];?></h6>
				<p>￥<?php echo ($pro['mPrice']*$pro['dicprice']);?></p>
			</div>
			<?php 
			endforeach;
			endif;
			endif;
			?>
			
			
		</div>
		
			
		
	</div>
</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">京东简介</a><i>|</i><a href="#">京东公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 京东版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>

<script type="text/javascript">
    	function show(shopcates,catelists){
	    		var menu=document.getElementById(catelists);
    	             menu.style.display='';
    	        var cates=document.getElementById(shopcates);
    	            cates.style.color="red";
    	             
        }
    	function vanish(shopcates,catelists){
    		var menu=document.getElementById(catelists);
	             menu.style.display='none';
	        var cates=document.getElementById(shopcates);
 	             cates.style.color="black";
    }
        function recommend(){
             
            }
    
    </script>
</body>
</html>
