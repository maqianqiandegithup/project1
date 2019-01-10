<?php
require_once '../include.php';

$id=$_REQUEST['id'];
$proInfo=getProById($id);
$i=1;

$proImgs=getAllImgByProId($id);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品介绍</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<link type="text/css" rel="stylesheet" media="all" href="styles/jquery.jqzoom.css"/>
<script src="scripts/jquery-1.6.js" type="text/javascript"></script>
<script src="scripts/jquery.jqzoom-core.js" type="text/javascript"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script type="text/javascript">

$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false,
			title:false,
			zoomWidth:410,
			zoomHeight:410
        });
	
});
function choose(id){
if(id.id=="choose"){
	
	id.style.borderColor="#1111EE";
	id.children[0].style.color="#FF0000";
	id.id="choose2";
	
}else{
	id.style.borderColor="#ccc";
	id.children[0].style.color="#666";
	id.id="choose";
	
	
}
	
}
function color(id){
	id.style.borderColor="#1111EE";
	id.style.color="#FF0000";
	var parentnode=id.parentNode;
	var children=parentnode.children;
	//console.log(children);
	
//	$_SESSION['color']=id.innerHTML;
for (x in  children){
	console.log(children[x].id);
	if(children[x].id==id.id){}
	else{
		children[x].style.borderColor="#ccc";
		children[x].style.color="#666";
				}
}


</script>
</head>

<body class="grey">
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
				</span></a>	</div>
			<div class="rightArea">
				欢迎来到京东商城
				<?php if($_SESSION['loginFlag']):?>
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

</div>
<div class="userPosition comWidth">
	<strong><a href="index.php">首页</a></strong>
	<span>&nbsp;&gt;&nbsp;</span>
	<?php echo ('<a href="index.php#'.$proInfo['cName'].'">'.$proInfo['cName'].'</a>');?>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo $proInfo['pSn']?></em>
</div>
<div class="description_info comWidth" >
	<div class="description clearfix" style="margin-top:1em;">
		<div class="leftArea">
			<div class="description_imgs">
				<div class="big">
					<a href="../image_800/<?php echo  $proImgs[0]['albumPath'];?>" class="jqzoom" rel='gal1'  title="triumph" >
           			 <img width="309" height="340" src="../image_350/<?php  echo $proImgs[0]['albumPath'];?>"  title="triumph">
	        		</a>
				</div>
				<ul class="des_smimg clearfix" id="thumblist" >
					<?php foreach($proImgs as $key=>$proImg):?>
					<li><a class="<?php echo $key==0?"zoomThumbActive":"";?> active" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '../image_350/<?php echo $proImg['albumPath'];?>',largeimage: '../image_800/<?php echo $proImg['albumPath'];?>'}"><img src="../image_50/<?php echo $proImg['albumPath'];?>" alt=""></a></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="rightArea">
		<form  method="post" enctype="multipart/form-data" >
			<div class="des_content">                                     
				
				<h3 class="des_content_tit"><?php echo $proInfo['pName'];?></h3>
				<?php if($proInfo['dicprice']==1){
				       echo('<div class="dl clearfix" id="oriprice">
					   <span class="dt">价  格：</span>
					   <div class="dd clearfix">
					   <span class="des_money" style="color:red;font-size:25px;"><em>￥</em>'.$proInfo['mPrice'].'</span></div></div>');}
				       else{
				        echo(   '<div class="dl clearfix" id="delprice">
				           <span class="dt">价  格：</span>
				           <div class="dd clearfix">
				           <span style="color:black" class="des_money"><del><em>￥</em>'.$proInfo['mPrice'].'</del></span></div>
				</div>
				<div class="dl clearfix" id="disprice">
					<span class="dt" style="color:red;" >京东价：</span>
					<div class="dd clearfix">
					<span class="des_money" style="color:red;font-size:25px;"><em style="color:red;font-size:25px;">￥</em>'.($proInfo['mPrice']*$proInfo['dicprice']).'</span></div>
				</div>');
				       }
				?>
				
			
				<div class="des_position">
					<div class="dl clearfix">
						<div class="dt">送到</div>
						<div class="dd clearfix">
							<div class="select">
								<h3>海淀区五环内</h3><span></span>
								<ul class="show_select">
									<li>上帝</li>
									<li>五道口</li>
									<li>上帝</li>
								</ul>
							</div>
							<span class="theGoods">有货，可当日出货</span>
						</div>
					</div>
					<div class="dl clearfix">
						<div class="dt colorSelect">选择颜色</div>
						<div class="dd clearfix">
						
			
		
				<select style="color:black;" class="des_item " name="pcolor">
						
			<?php for($i=1;$i<5;$i++){
			 if($proInfo['color'.$i]==''){break;}?>
				<option value="<?php echo $proInfo['color'.$i];?>"><?php echo $proInfo['color'.$i];?></option>
		    	<?php }?>
		</select>
						</div>
					</div>
					<div class="dl clearfix">
						<div class="dt des_select_more">选择尺寸</div>
						<div class="dd clearfix ">
						<select id="choose" class="des_item "  style="color:black;" class="des_item " name="psize">
						<option value="均码">均码</option>								
						</select>	
						</div>
					</div>
					<div class="dl">
						<div class="dt des_num">数量</div>
						 <div class="dd clearfix">
							<div class="des_number">
								<div class="reduction">-</div>
								<div class="des_input">
									<input type="text" name="bnum"/>
								</div>
								<div class="plus">+</div>
							</div>
							<span class="xg">限购<em>9</em>件</span>
						</div>
					</div>
				</div>
			
				<div class="dl clearfix">
						<div class="dt des_select_more" style="color:black;">已选择</div>
						<div class="dd clearfix ">
					
					
																				
						</div>
					</div>
				<div class="shop_buy">
					<input type="submit" onClick="left(<?php echo $proInfo['id'];?>)" class="shopping_btn" value=""/>
					<span class="line"></span>
					<input type="button"  onClick="right(<?php echo $proInfo['id'];?>)" style="font-size:25px; border:#FF6347 solid 2px" class="buy_btn" value="立即购买"/>
				</div>
			</div>
		</form>
				<div class="notes">
					注意：此商品可提供普通发票，不提供增值税发票。
				</div>
			</div>
		</div>
	</div>

<div class="hr_15"></div>
<div class="des_info comWidth clearfix">
	<div class="leftArea">
       		
		<div class="recommend">
			<h3 class="tit">同类商品</h3>
			<?php 	
			$pros=getProsByCid($proInfo['cId']);
			
			foreach ($pros as $pro){
			    if($pro['id']!=$proInfo['id']){
			        $proImg=getProImgById($pro['id']);
			?>
		
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="proDetails.php?id=<?php echo ($pro['id'])?> "target="_blank"><img src="../image_220/<?php echo $proImg['albumPath'];?>" alt=""></a>
					</div>
					<p><a href="proDetails.php?id=<?php echo ($pro['id'])?> "target="_blank"><?php echo $pro['pName'];?></a></p>
					<p class="money">￥<?php echo $pro['mPrice'];?></p>
				</div>
			</div>
			<?php }}
			?>
		</div>
	</div>
	<div class="rightArea">
		<div class="des_infoContent">
			<ul class="des_tit">
				<li class="active"><span>产品介绍</span></li>
				<li><span>产品评价(12312)</span></li>
			</ul>
			<div class="proDesc">
				<div class="info_tit">
					<h3><?php echo $proInfo['pDesc'];?></h3>
				
				</div>
			  <div style="clear:both"></div>
				<div class="hr_45"></div>
			</div>
		</div>
		<div class="hr_15"></div>
		<div class="des_infoContent">
			<h3 class="shopDes_tit">商品评价</h3>
			<div class="score_box clearfix">
				<div class="score">
					<span>4.7</span><em>分</em>
				</div>
				<div class="score_speed">
					<ul class="score_speed_text">
						<li class="speed_01">非常不满意</li>
						<li class="speed_02">不满意</li>
						<li class="speed_03">一般</li>
						<li class="speed_04">满意</li>
						<li>非常满意</li>
					</ul>
					<div class="score_num">
						4.7<i></i>
					</div>
					<p>共18939位京东顾客参与评分</p>
				</div>
			</div>
			<div class="review_tab">
				<ul class="review fl">
					<li><a href="#" class="active">全部</a></li>
					<li><a href="#">满意（3121）</a></li>
					<li><a href="#">一般（321）</a></li>
					<li><a href="#">不满意（1121）</a></li>
				</ul>
				
			</div>
			<div class="review_listBox">
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userhead.jpg" alt="">
							<p>61***42</p>
							<p>金色会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>京东的衣服质量有保障</p>
					</div>
				</div>
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userhead.jpg" alt="">
							<p>61***42</p>
							<p>金色会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>京东的衣服质量有保障</p>
						
					</div>
				</div>
				<div class="hr_25"></div>
			</div>
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

function left($pid){
		var form=document.getElementsByTagName("form")[0];
		var pcolor=document.getElementsByName("pcolor")[0].value;
		var psize=document.getElementsByName("psize")[0].value;
		var bnum=document.getElementsByName("bnum")[0].value;
		if(!(pcolor&&psize&&bnum)){
			alert("请选择商品数量");
			exit();
			}
		if(!pcolor){
			alert("请选择商品颜色");
			exit();
			}
		
		if(!psize){
			alert("请选择商品尺寸");
			exit();
			}
		
		if(!bnum){
			alert("请填写商品数量");
			exit();
			}
		
		form.action="doUserAction.php?act=addcar&pid="+$pid;
}
function right($pid){
var pcolor=document.getElementsByName("pcolor")[0].value;

var psize=document.getElementsByName("psize")[0].value;
var bnum=document.getElementsByName("bnum")[0].value;
if(!(pcolor&&psize&&bnum)){
	alert("请选择商品数量");
	exit();
	}
if(!pcolor){
	alert("请选择商品颜色");
	exit();
	}

if(!psize){
	alert("请选择商品尺寸");
	exit();
	}

if(!bnum){
	alert("请填写商品数量");
	exit();
	}

window.open("order.php?pid="+$pid+"&pcolor="+pcolor+"&psize="+psize+"&bnum="+bnum);
}


</script>
</body>
</html>
